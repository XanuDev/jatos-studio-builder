@push('styles')
<style>
    .bd-building-modal-lg .modal-dialog {
        display: table;
        position: relative;
        margin: 0 auto;
        top: calc(50% - 24px);
    }

    .bd-building-modal-lg .modal-dialog .modal-content {
        background-color: transparent;
        border: none;
    }
</style>
@endpush

<div class="row">
    <div class="col-2 ml-2">
        <div class="card">
            <div class="card-header">{{ __('Components') }}</div>
            <div class="card-body">
                <div class="list-group">
                    @foreach ($components as $key => $component)
                    <a href="#" wire:click="setActive({{ $key }})"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-cente {{ $component['active'] ? 'active' : '' }}"
                        {{ $component['active'] ? 'aria-current="true"' : '' }}>{{ $component['title'] }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        @include('partials.messages')
        @foreach ($components as $component_key => $component)

        <div class="card" {!! $component['active'] ? '' : 'style="display: none"' !!}>
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-4">
                        {{ $component['title'] }}
                    </div>
                    <div class="col-1">
                        <button class="btn btn-sm btn-danger"
                            wire:click.prevent="$emitTo('delete-modal', 'open', {{ $component_key }}, 'removeComponent')"
                            data-toggle="modal">{{ __('Remove') }}</button>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="accordion" id="buildAccordion-{{ $component_key }}">

                    @foreach ($component['inputs'] as $input_key => $input)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="input-heading-{{ $component_key }}-{{  $input_key }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#input-collapse-{{ $component_key }}-{{ $input_key }}"
                                aria-expanded="false"
                                aria-controls="input-collapse-{{ $component_key }}-{{ $input_key }}">
                                {{ $input['name'] }}
                            </button>
                        </h2>
                        <div id="input-collapse-{{ $component_key }}-{{ $input_key }}"
                            class="accordion-collapse collapse bg-white"
                            aria-labelledby="input-heading-{{ $component_key }}-{{ $input_key }}"
                            data-bs-parent="#buildAccordion-{{ $component_key }}" wire:ignore.self>
                            <div class="accordion-body">
                                <div class="d-flex flex-row-reverse ">
                                    <button class="btn btn-sm btn-outline-danger"
                                        wire:click.prevent="$emitTo('delete-modal', 'open', {{ $input_key }}, 'removeInput')"
                                        data-toggle="modal">X</button>
                                </div>

                                @include('builder.components.' . $input['type'], [
                                'identifier' => $input['type']. '-' . $component_key . '-' . $input_key,
                                ])

                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="modal fade bd-building-modal-lg" wire:ignore.self id="buildingModal" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="width: 480px">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore>
        {{-- Delete Modal --}}
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
            <livewire:delete-modal>
        </div>
    </div>
</div>

@push('scripts')
<script>
    var form_builder_options = {
        i18n: {
            locale: 'en-US',
            location: window.location.protocol +'//'+ window.location.hostname + '/formbuilder/lang',
            extension: '.lang'
        },
        disabledActionButtons: ['data', 'save', 'clear'],
        disableFields: ['autocomplete', 'button', 'file', 'hidden', 'starRating'],
        disabledAttrs: ['access', 'className', 'subtype', 'inline', 
                        'toggle', 'other', 'max', 'min', 'maxlength', 'step'],
    };

    document.addEventListener("livewire:load", function(event) {
        (function($) {
            window.addEventListener('finish-build', event => {
                $('#buildingModal').modal('hide');
            })

            $('#btnBuild').click(() => {
                $('#buildingModal').modal('show');
            })
        })(window.jQuery);
    });   
</script>
@endpush
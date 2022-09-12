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
                        <button wire:click="removeComponent({{$key}})" class="btn btn-sm btn-danger">X</button>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                {{ sizeof($components) ? $components[$active_component]['title'] : 'No component selected' }}</div>
            <div class="card-body">
                @include('partials.messages')
                <div class="accordion" id="buildAccordion">
                    @if (sizeof($components))
                    @foreach ($components[$active_component]['inputs'] as $key => $input)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="input-heading-{{ $key }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#input-collapse-{{ $key }}" aria-expanded="false"
                                aria-controls="input-collapse-{{ $key }}">
                                {{ $input['name'] }}
                            </button>
                        </h2>
                        <div id="input-collapse-{{ $key }}" class="accordion-collapse collapse bg-white"
                            aria-labelledby="input-heading-{{ $key }}" data-bs-parent="#buildAccordion"
                            wire:ignore.self>
                            <div class="accordion-body">
                                <div class="d-flex flex-row-reverse ">
                                    <button class="btn btn-sm btn-outline-danger"
                                        wire:click.prevent="$emitTo('delete-modal', 'open', {{ $key }}, 'removeInput')"
                                        data-toggle="modal">X</button>
                                </div>
                                @include('components.' . $input['type'], [
                                'identifier' => $input['type']. '-' . $active_component . '-' . $key,
                                ])
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
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
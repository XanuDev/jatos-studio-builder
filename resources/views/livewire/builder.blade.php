<div class="row">
    <div class="col-2 ml-2">
        <div class="card">
            <div class="card-header">Components</div>
            <div class="card-body">
                <div class="list-group">
                    @foreach ($components as $key => $component)
                        <a href="#" wire:click="setActive({{ $key }})"
                            class="list-group-item list-group-item-action {{ $component['active'] ? 'active' : '' }}"
                            {{ $component['active'] ? 'aria-current="true"' : '' }}>{{ $component['title'] }}</a>
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
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (session()->has('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                @if ($building)
                    <div class="text-center">
                        <span>Building...</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div>
                    </div>
                @endif
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
                                <div id="input-collapse-{{ $key }}"
                                    class="accordion-collapse collapse bg-white"
                                    aria-labelledby="input-heading-{{ $key }}"
                                    data-bs-parent="#buildAccordion" wire:ignore.self>
                                    <div class="accordion-body">
                                        @include('inputs.' . $input['type'], [
                                            'identifier' => $input['type'] . '-' . $key,
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
</div>

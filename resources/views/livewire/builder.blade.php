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
            <div class="card-body">
                Builder
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
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
            </div>
        </div>
    </div>
</div>

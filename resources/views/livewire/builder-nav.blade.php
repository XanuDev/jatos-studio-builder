<div>
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h1 class="h3 mb-3">{{ $build->title }}</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            @if ($is_update)
                <button class="btn btn-outline-primary mx-2 my-2 my-sm-0" wire:click="$emit('update')">
                    Update
                </button>
            @else
                <button class="btn btn-outline-primary mx-2 my-2 my-sm-0" wire:click="$emit('save')">
                    Save
                </button>
            @endif
            <button class="btn btn-outline-secondary mx-2 my-2 my-sm-0" {{ $can_build ? '' : 'disabled' }}
                wire:click="$emit('build')" id="btnBuild">
                Build
            </button>
            <button class="btn btn-outline-success my-2 my-sm-0" {{ $can_download ? '' : 'disabled' }}
                wire:click="$emit('download')">
                Download
            </button>
        </div>
    </div>
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addComponentModal">
                New Component
            </button>
        </div>
        <div class="col-auto">
            <a class="dropdown-toggle btn btn-secondary" href="#" data-bs-toggle="dropdown">Add Input
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                @foreach (\App\Constants\Component::LIST as $key => $item)
                    @continue(!$item['active'])
                    <a class="dropdown-item" href="#"
                        wire:click="addInput('{{ $key }}')">{{ $item['name'] }}</a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="addComponentModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="addComponentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addComponentModalLabel">New Component</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" class="form-control" id="title" name="title"
                            wire:model.defer="new_title">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="addComponent">Add</button>
                </div>
            </div>
        </div>
    </div>
</div>

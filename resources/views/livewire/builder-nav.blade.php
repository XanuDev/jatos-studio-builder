<div>
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h1 class="h3 mb-3">{{ $build->title }}</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <button class="btn btn-outline-primary mx-2 my-2 my-sm-0" wire:click="$emit('save')">
                Save
            </button>
            <button class="btn btn-outline-secondary mx-2 my-2 my-sm-0" {{ $can_build ? '' : 'disabled' }}
                wire:click="$emit('build')">
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
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#newComponentModal">
                New Component
            </button>
        </div>
        <div class="col-auto">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Add input
                </button>
                <ul class="dropdown-menu mt-5" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="newComponentModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="newComponentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newComponentModalLabel">Modal title</h5>
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
                    <button type="button" class="btn btn-primary"
                        wire:click.prevent="new_component">Understood</button>
                </div>
            </div>
        </div>
    </div>
</div>

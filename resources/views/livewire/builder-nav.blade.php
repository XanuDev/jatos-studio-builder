<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
        <a class="navbar-brand" href="#">{{ $build->name }}</a>
        <ul class="navbar-nav mr-auto mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" id="show-modal">New Component</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">New Input</a>
            </li>
        </ul>
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
    </nav>
</div>

<div>
    <label for="title-{{ $identifier }}">Title</label>
    <input type="text" id="title-{{ $identifier }}"
        wire:model="components.{{ $active_component }}.inputs.{{ $key }}.title" class="form-control mb-2">

    <div wire:ignore>
        <div id="{{ $identifier }}"></div>
    </div>

    @include('inputs.summernote-script')
</div>

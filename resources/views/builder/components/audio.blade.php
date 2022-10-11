<div>
    <label for="title-{{ $identifier }}">Title</label>
    <input type="text" id="title-{{ $identifier }}"
        wire:model="components.{{ $active_component }}.inputs.{{ $input_key }}.title" class="form-control mb-2">

    @include('partials.ckeditor')
</div>
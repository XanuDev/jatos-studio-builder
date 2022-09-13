<div>
    <label for="title-{{ $identifier }}">{{ __('Title') }}</label>
    <input type="text" id="title-{{ $identifier }}"
        wire:model="components.{{ $active_component }}.inputs.{{ $key }}.title" class="form-control mb-2">

    @include('partials.summernote-script')
</div>
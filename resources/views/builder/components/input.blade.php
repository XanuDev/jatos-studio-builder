<div>
    <label for="title-{{ $identifier }}">{{ __('Title') }}</label>
    <input type="text" id="title-{{ $identifier }}"
        wire:model="components.{{ $active_component }}.inputs.{{ $input_key }}.title" class="form-control mb-2">
    <div class="mt-4" wire:ignore>
        @include('partials.form-builder')
    </div>
</div>
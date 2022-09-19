<div>
    <label for="title-{{ $identifier }}">{{ __('Title') }}</label>
    <input type="text" id="title-{{ $identifier }}"
        wire:model="components.{{ $active_component }}.inputs.{{ $key }}.title" class="form-control mb-2">

    <div class="mt-4">
        <livewire:form-builder :identifier="$identifier" :input_key="$key" :component="$active_component"
            :components="$components" wire:key="$identifier">
    </div>
</div>
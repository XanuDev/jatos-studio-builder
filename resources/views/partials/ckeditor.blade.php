<div class="mt-2 bg-white" wire:ignore>
    <div id="{{ $identifier }}" class="form-textarea w-full" x-data x-init="ClassicEditor.create(document.querySelector('#{{ $identifier }}')).then(
        function(editor){
            editor.model.document.on('change:data', () => {
               $dispatch('input', editor.getData())
            })
        })" wire:key="{{ $identifier }}" x-ref="{{ $identifier }}"
        wire:model="components.{{ $component_key }}.inputs.{{ $input_key }}.contents">
        {!! $components[$component_key]['inputs'][$input_key]['contents'] !!}
    </div>
</div>
<div class="mt-2 bg-white" wire:ignore>
    <textarea class="wysiwyg" id="{{ $identifier }}"
        wire:model="components.{{ $component_key }}.inputs.{{ $input_key }}.contents">
        {!! $components[$component_key]['inputs'][$input_key]['contents'] !!}
    </textarea>
</div>

<script>
    if (@js($preload)) {
        window.addEventListener('load', function () {  
            ClassicEditor.create(document.querySelector('#' + @js($identifier)));
        });
    }
    else
    {
        ClassicEditor.create(document.querySelector('#' + @js($identifier)));
    }
</script>
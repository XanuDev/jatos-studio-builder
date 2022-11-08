<div class="mt-2 bg-white" wire:ignore>
    <div id="{{ $identifier }}" wire:model="components.{{ $component_key }}.inputs.{{ $input_key }}.contents">
        {!! $components[$component_key]['inputs'][$input_key]['contents'] !!}
    </div>
</div>

<script>
    if (@js($preload)) {
        window.addEventListener('load', function () {  
            var quill = chargeQuill(@js($identifier));
            quill.on('text-change', function () {        
                    @this.set('components.{{ $component_key }}.inputs.{{ $input_key }}.contents', quill.root.innerHTML);
            });
        });
    }
    else
    {
        var quill = chargeQuill(@js($identifier));
        quill.on('text-change', function () {        
                @this.set('components.{{ $component_key }}.inputs.{{ $input_key }}.contents', quill.root.innerHTML);
        });
    }
</script>
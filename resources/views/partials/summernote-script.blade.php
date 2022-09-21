<div wire:ignore>
    <div id="{{ $identifier }}">{!! $components[$component_key]['inputs'][$input_key]['contents'] !!}</div>
</div>
<script>
    if (@js($preload)) {
        document.addEventListener("livewire:load", function(event) {
            (function($) {
                $('#' + @js($identifier)).summernote({
                    height: 150,
                    callbacks: {
                        onChange: function(contents, $editable) {
                            @this.set(
                                'components.{{ $component_key }}.inputs.{{ $input_key }}.contents',
                                contents);
                        }
                    }
                });                
            })(window.jQuery);
        });
    } else {
        (function($) {
            $('#' + @js($identifier)).summernote({
                height: 150,
           
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set(
                            'components.{{ $component_key }}.inputs.{{ $input_key }}.contents',
                            contents);
                    },
                }
            });            
        })(window.jQuery);
    }
</script>
<div wire:ignore>
    <div id="{{ $identifier }}">{!! $components[$active_component]['inputs'][$input_key]['contents'] !!}</div>
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
                                'components.{{ $active_component }}.inputs.{{ $input_key }}.contents',
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
                            'components.{{ $active_component }}.inputs.{{ $input_key }}.contents',
                            contents);
                    },
                }
            });            
        })(window.jQuery);
    }
</script>
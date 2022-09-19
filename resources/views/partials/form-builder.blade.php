<div wire:ignore>
    <div id="form-{{ $identifier }}"></div>
</div>

<script>
    if (@js($preload)) {
        document.addEventListener("livewire:load", function(event) {
            (function($) {
                formBuilderStart();
            })(window.jQuery);
        });
    } else {
        (function($) {
            formBuilderStart();
        })(window.jQuery);
    }

    function formBuilderStart()
    {
        @this.isBuilderLoaded(@js($identifier)).then((result) => {
            if(result){                
                @this.addBuilder(@js($identifier));
                $('#saveBtn').click((e) => {                    
                    let json = formBuilder.actions.getData('json', true);            
                    @this.set('components.{{ $active_component }}.inputs.{{ $key }}.fields', json);            
                });                
            }
        });
                   
        var options = {
            disabledActionButtons: ['data', 'save', 'clear'],
            disableFields: ['autocomplete', 'button', 'file', 'hidden', 'starRating'],
            disabledAttrs: ['access', 'className', 'subtype', 'inline', 
                            'toggle', 'other', 'max', 'min', 'maxlength', 'step'],
        };

        let formBuilder = $('#form-' + @js($identifier)).formBuilder(options);
        let input = @js($components[$active_component]['inputs'][$key]);
        console.log(input['fields']);
        if(input['fields'] !== undefined)
        {                       
            formBuilder.promise.then(function(fb) {                
                fb.actions.setData(input['fields']);                                          
            });
        }
    }
</script>
<div>
    <div id="form-{{ $identifier }}"></div>
</div>

<script>
    if (@js($preload)) {
        document.addEventListener("livewire:load", function(event) {
            (function($) {
                
                let formBuilder = $('#form-' + @js($identifier)).formBuilder(form_builder_options);
                $('#saveBtn').click((e) => {                            
                    let json = formBuilder.actions.getData('json', true);
                    @this.set('components.{{ $component_key }}.inputs.{{ $input_key }}.fields', json);                                
                });
                
                formBuilder.promise.then(function(fb) {           
                    let input = @this.components[@js($component_key)]['inputs'][@js($input_key)];
                    
                    if(input['fields'] !== undefined)
                    {   
                        fb.actions.setData(input['fields']);
                    }
                });
            })(window.jQuery);
        });
    } else {
        (function($) {
            let formBuilder = $('#form-' + @js($identifier)).formBuilder(form_builder_options);
            $('#saveBtn').click((e) => {                            
                let json = formBuilder.actions.getData('json', true);
                @this.set('components.{{ $component_key }}.inputs.{{ $input_key }}.fields', json);                                
            });            
        })(window.jQuery);
    }
</script>
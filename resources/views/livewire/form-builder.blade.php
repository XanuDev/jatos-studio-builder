<div>
    {{$count}}
    <div id="form-{{ $identifier }}"></div>
</div>

<script>
    //document.addEventListener("livewire:load", function(event) {
    
        (function($) {
            $('#saveBtn').click((e) => {                    
                let json = formBuilder.actions.getData('json', true);            
                @this.set('components.{{ $component }}.inputs.{{ $input_key }}.fields', json);            
            });      

            var options = {
                disabledActionButtons: ['data', 'save', 'clear'],
                disableFields: ['autocomplete', 'button', 'file', 'hidden', 'starRating'],
                disabledAttrs: ['access', 'className', 'subtype', 'inline', 
                                'toggle', 'other', 'max', 'min', 'maxlength', 'step'],
            };

            let formBuilder = $('#form-' + @js($identifier)).formBuilder(options);
                               
            formBuilder.promise.then(function(fb) {                   
                let input = @this.components[@this.component]['inputs'][@this.input_key];
                    
                if(input['fields'] !== undefined)
                {                 
                    fb.actions.setData(input['fields']);                                          
                }
            });
        })(window.jQuery);
    //});
    
</script>
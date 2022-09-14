<div wire:ignore>
    <div id="form-{{ $identifier }}"></div>
</div>

<script>
    if (@js($preload)) {
        document.addEventListener("livewire:load", function(event) {
            (function($) {
                let formdata = [];
                let formBuilder = $('#form-' + @js($identifier)).formBuilder();
                formBuilder.actions.setData(formData);           
            })(window.jQuery);
        });
    } else {
        (function($) {
            var options = {
                disabledActionButtons: ['data', 'save', 'clear'],
                disableFields: ['autocomplete', 'button', 'file', 'hidden', 'starRating'],
                disabledAttrs: ['access', 'className', 'subtype', 'inline', 
                                'toggle', 'other', 'max', 'min', 'maxlength', 'step'],
            };

            let formBuilder = $('#form-' + @js($identifier)).formBuilder(options);            
            $('#saveBtn').click((e) => {
                let json = formBuilder.actions.getData('json', true);                
                @this.set('components.{{ $active_component }}.inputs.{{ $key }}.fields', json);
            })
        })(window.jQuery);
    }

</script>
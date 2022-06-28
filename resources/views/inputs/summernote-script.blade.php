<script>
    (function($) {
        $('#' + @js($identifier)).summernote({
            height: 150,
            callbacks: {
                onChange: function(contents, $editable) {
                    @this.set(
                        'components.{{ $active_component }}.inputs.{{ $key }}.contents',
                        contents);
                }
            }
        });
    })(window.jQuery);
</script>

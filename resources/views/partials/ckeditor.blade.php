<div wire:ignore>
    <textarea name="{{ $identifier }}" id="{{ $identifier }}" rows="10" cols="80" wire:model="
    components.{{ $component_key }}.inputs.{{ $input_key }}.contents">
        {!! $components[$component_key]['inputs'][$input_key]['contents'] !!}
    </textarea>
</div>
<script>
    CKEDITOR.replace( document.querySelector('#' + @js($identifier)), {
        //language: 'es',
        //uiColor: '#9AB8F3'
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    } ).on( 'change', function( evt ) {                
        @this.set(
            'components.{{ $component_key }}.inputs.{{ $input_key }}.contents',
            evt.editor.getData())        
    });
  
</script>
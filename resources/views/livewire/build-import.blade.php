<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">{{ __('Import project') }}</h5>
    </div>
    @include('partials.messages')
    <div class="card-body">
        <form action="{{ route('builder.import') }}" method="POST" id="json_form">
            @csrf
            <div class="form-group">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group my-3">
                <label for="description">{{ __('Description') }}</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="json_file">{{ __('File') }}</label>
                <input type="file" class="form-control" id="json_file" name="json_file">
            </div>
            <div class="form-group my-3">
                <label for="json">{{ __('Json') }}</label>
                <textarea class="form-control" id="json" name="json" rows="15" wire:model.defer="content"></textarea>
            </div>
        </form>
        <button class="btn btn-primary" id="import_btn">{{ __('Import') }}</button>
        <button class="btn btn-warning" id="clear_btn" wire:click="clear">{{ __('Clear') }}</button>
    </div>

</div>

@push('scripts')
<script>
    document.addEventListener("livewire:load", function(event) {
        (function($) {
            $('#json_file').change(function(e) {                
                let file = e.target.files[0];
                if(file)
                {
                    let reader = new FileReader();
                    reader.readAsText(file, "UTF-8");
                    reader.onload = function (evt) {            
                        @this.file_content = evt.target.result;
                        @this.load_file();
                    }
                    reader.onerror = function (evt) {
                        console.log("Error reading file");
                    }
                }              
                
            });

            $('#import_btn').click(function(e) {
                @this.import().then(function(res)
                {
                    if(res) $('#json_form').submit();
                });
            });            

            $('#clear_btn').click(function(e) {
                $('#json_file').val(null);                
            });
            
        })(window.jQuery);
    });
</script>
@endpush
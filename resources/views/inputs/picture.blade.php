<div>
    <div class="mb-5">
        <label for="Image" class="form-label">Select image</label>
        <input class="form-control" type="file" id="formFile-{{ $identifier }}"
            wire:model="components.{{ $active_component }}.inputs.{{ $key }}.contents">
        <button id="clearBtn-{{ $identifier }}" class="btn btn-primary mt-3">Clear</button>
    </div>
    <div wire:ignore>
        <img id="frame-{{ $identifier }}" src="" class="img-fluid" />
    </div>

    <script>
        $('#formFile-' + @js($identifier)).change(function(e) {
            $('#frame-' + @js($identifier)).attr('src', URL.createObjectURL(event.target.files[0]));
        });

        $('#clearBtn-' + @js($identifier)).click(function() {
            $('#formFile-' + @js($identifier)).val(null);
            $('#frame-' + @js($identifier)).attr('src', "");
        });
    </script>
</div>

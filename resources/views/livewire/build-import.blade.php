<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">{{ __('Import project') }}</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="file">{{ __('File') }}</label>
            <input type="file" class="form-control" id="file" name="file" wire:model="test">
        </div>
        {{ $content }}
        <div class="form-group my-3">
            <label for="json">{{ __('Json') }}</label>
            <textarea class="form-control" id="json" name="json" rows="15"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Import') }}</button>
    </div>
</div>
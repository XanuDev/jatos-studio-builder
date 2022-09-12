<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{ __('Delete ' . $model_name) }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <p>{{ __('Are you sure you want to delete these ' . $model_name . 's?') }} {{ __('Everything connected
                to
                this ' . $model_name . ' will be eliminated.') }}</p>
            <p class="text-warning"><small>{{ __('This action cannot be undone.') }}</small></p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
            <button class="btn btn-danger" data-dismiss="modal" wire:click="delete">{{
                __('Delete') }}</button>
        </div>
    </div>
</div>
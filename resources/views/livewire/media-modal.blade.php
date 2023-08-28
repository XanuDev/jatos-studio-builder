<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{ __('Delete') }}</h4>
            <button type="button" class="close" data-dismiss="modal" wire:click="close"
                aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <p>{{ __('Are you sure you want to delete?') }}</p>
            <p class="text-warning"><small>{{ __('This action cannot be undone.') }}</small></p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" wire:click="close">{{ __('Cancel') }}</button>
            @if($event)
            <button class="btn btn-danger" data-dismiss="modal" wire:click="delete">{{
                __('Delete') }}</button>
            @elseif($model)
            <form action="{{ route($model.'.destroy', $key) }}" method="POST">
                @method('DELETE')
                @csrf
                <input type="hidden" name="key" value="1">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">{{
                    __('Delete') }}</button>
            </form>
            @endif
        </div>
    </div>
</div>
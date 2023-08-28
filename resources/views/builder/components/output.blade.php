<div>
    <label for="title-{{ $identifier }}">{{ __('Title') }}</label>
    <input type="text" id="title-{{ $identifier }}"
        wire:model="components.{{ $active_component }}.inputs.{{ $input_key }}.title" class="form-control mb-2">

    @include('partials.ckeditor')

    <div class="btn-group btn-group-toggle my-2 border-1" data-toggle="buttons">
        <a href="#" class="btn btn-secondary mediaModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-film"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect><line x1="7" y1="2" x2="7" y2="22"></line><line x1="17" y1="2" x2="17" y2="22"></line><line x1="2" y1="12" x2="22" y2="12"></line><line x1="2" y1="7" x2="7" y2="7"></line><line x1="2" y1="17" x2="7" y2="17"></line><line x1="17" y1="17" x2="22" y2="17"></line><line x1="17" y1="7" x2="22" y2="7"></line></svg>
        </a>
        <a href="#" class="btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-headphones"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>
        </a>
        <a href="#" class="btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
        </a>
    </div>

    <div class="mb-3">
        <label for="images" class="form-label">{{ __('Add image') }}</label>
        <input type="file" class="form-control" id="images" name="image"
            accept="image/png, image/jpeg, image/jpg, image/gif" />
        <small id="imageHelp" class="form-text text-muted">{{ __('Note: Total size of uploading files shold
            not be greater than 8 MB.') }}</small>
    </div>
    <div class="mb-3">
        <label for="video" class="form-label">{{ __('Add video') }}</label>
        <input type="file" class="form-control" id="video" name="video"
            accept="video/*" />
        <small id="videoHelp" class="form-text text-muted">{{ __('Note: Total size of uploading files shold
            not be greater than 8 MB.') }}</small>
    </div>

</div>
<div wire:ignore>    
    <div class="modal fade" id="mediaModal" tabindex="-1" role="dialog" aria-hidden="true">
        <livewire:media-modal>
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener("livewire:load", function(event) {
        (function($) {
            $('.mediaModal').click((e) => {
                Livewire.emitTo('media-modal', 'open'); 
            })
        })(window.jQuery);
    });
</script>
@endpush
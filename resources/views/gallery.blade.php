@extends('layouts.app')

@section('content')
<h1 class="h3 mb-3">{{ __('Gallery') }}</h1>
@include('partials.messages')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

        <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 col-3">
                <label for="images" class="form-label">{{ __('Images') }}</label>
                <input type="file" class="form-control" id="images" name="image[]"
                    accept="image/png, image/jpeg, image/jpg, image/gif" multiple />
                <small id="imageHelp" class="form-text text-muted">{{ __('Note: Total size of uploading files shold
                    not be greater than 8 MB.') }}</small>
            </div>
            <div class="mb-3 col-3">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" name="title" id="title" class="form-control" />
                <small id="titleHelp" class="form-text text-muted">{{ __('Required and unique') }}</small>
            </div>

            <button type="submit" class="btn btn-success" style="margin-bottom: 0px;">{{ __('Upload')
                }}</button>

        </form>

        <div class="row text-center text-lg-start mt-4">
            @forelse ($images as $image)

            <div class="card mx-2 pt-2" style="width: 18rem;">

                <h5 class="card-title">{{ $image->title }}</h5>

                <img class="card-img-top" src="{{  asset($image->thumbnail) }}" alt="Card image cap">
                <div class="card-body text-center">
                    <form action="{{ route('gallery.destroy', $image->id) }}" method="post"
                        onsubmit="return confirm('Are you sure you want to delete this record?');">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}
                        <button type="submit" name="Delete" class="btn btn-sm btn-danger action_btn">Delete</button>
                    </form>
                </div>

            </div>
            @empty
            <p>No record found.</p>
            @endforelse
            {{ $images->links() }}
        </div>
    </div>

</div>

@endsection
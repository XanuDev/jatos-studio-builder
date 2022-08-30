@if ($errors->any())
<div class="row justify-content-center">
    <div class="alert alert-danger alert-dismissible fade show w-50" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if (session()->has('message'))
<div class="text-center row justify-content-center">
    <div class="col-6 alert alert-primary alert-dismissible fade show" role="alert">
        <strong><i class="align-middle" data-feather="info"></i></strong>
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
@if (session()->has('success'))
<div class="text-center row justify-content-center">
    <div class="col-6 alert alert-success alert-dismissible fade show w-50" role="alert">
        <strong><i class="align-middle" data-feather="info"></i></strong>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
@if (session()->has('warning'))
<div class="text-center row justify-content-center">
    <div class="alert alert-warning alert-dismissible fade show w-50" role="alert">
        <strong><i class="align-middle" data-feather="alert-triangle"></i></strong>
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
@if (session()->has('error'))
<div class="text-center row justify-content-center">
    <div class="alert alert-danger alert-dismissible fade show w-50" role="alert">
        <strong><i class="align-middle" data-feather="alert-circle"></i></strong>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
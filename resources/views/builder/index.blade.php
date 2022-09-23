@extends('layouts.app')

@section('content')
@include('partials.messages')

<div class="card flex-fill">
    <div class="card-header">
        <h5 class="card-title mb-0">{{ __('Projects') }}</h5>
    </div>
    <table class="table table-hover my-0">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-xl-table-cell">{{ __('Date') }}</th>
                <th>{{ __('Visibility') }}</th>
                <th class="d-none d-md-table-cell">{{ __('Owner') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($builds as $key => $build)
            <tr>
                <td>{{ $build->id }}</th>
                <td>{{ $build->title }}</td>
                <td class="d-none d-xl-table-cell">{{ $build->created_at }}</td>
                @if ($build->is_private)
                <td><span class="badge bg-danger">{{ __('Private') }}</span></td>
                @else
                <td><span class="badge bg-success">{{ __('Public') }}</span></td>
                @endif
                <td class="d-none d-md-table-cell">{{ $build->user->name }}</td>
                <td>
                    <a href="{{ route('builder.edit', $build) }}"><i class="align-middle text-primary"
                            data-feather="edit"></i></a>
                    <a href="#" class="btnTrash" data-key="{{ $build->id }}"><i class="align-middle text-danger"
                            data-feather="trash-2"></i></a>
                    <a href="{{ route('builder.download', ['id' => $build->id]) }}"><i class="align-middle text-success"
                            data-feather="download"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div wire:ignore>
    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <livewire:delete-modal>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener("livewire:load", function(event) {
        (function($) {
            $('.btnTrash').click((e) => {
                Livewire.emitTo('delete-modal', 'open', e.currentTarget.dataset.key, false, 'builder'); 
            })
        })(window.jQuery);
    });
</script>
@endpush
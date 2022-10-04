<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('home') }}">
            <span class="align-middle">{{ __('Jatos Builder') }}</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">{{ __('Pages') }}</li>

            <li class="sidebar-item {{ set_active('/') }}">
                <a class="sidebar-link" href="{{ route('home') }}">
                    <i class="align-middle" data-feather="home"></i>
                    <span class="align-middle">{{ __('Home') }}</span>
                </a>
            </li>

            <li class="sidebar-header">{{ __('Builder') }}</li>

            <li class="sidebar-item {{ set_active('builder') }}">
                <a class="sidebar-link" href="{{ route('builder.index') }}">
                    <i class="align-middle" data-feather="database"></i>
                    <span class="align-middle">{{ __('Projects') }}</span>
                </a>
            </li>

            <li class="sidebar-item {{ set_active('builder/create') }}">
                <a class="sidebar-link" href="{{ route('builder.create') }}">
                    <i class="align-middle" data-feather="tool"></i>
                    <span class="align-middle">{{ __('New Project') }}</span>
                </a>
            </li>

            <li class="sidebar-header">{{ __('Users') }}</li>

            <li class="sidebar-item {{ set_active('user') }}">
                <a class="sidebar-link" href="{{ route('user.index') }}">
                    <i class="align-middle" data-feather="users"></i>
                    <span class="align-middle">{{ __('Users') }}</span>
                </a>
            </li>

            <li class="sidebar-item {{ set_active('user/create') }}">
                <a class="sidebar-link" href="{{ route('user.create') }}">
                    <i class="align-middle" data-feather="user-plus"></i>
                    <span class="align-middle">{{ __('New User') }}</span>
                </a>
            </li>

            <li class="sidebar-header">{{ __('Tools') }}</li>

            <li class="sidebar-item {{ set_active('builder/import') }}">
                <a class="sidebar-link" href="{{ route('builder.import') }}">
                    <i class="align-middle" data-feather="upload"></i>
                    <span class="align-middle">{{ __('Import') }}</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-cta">
            <div class="sidebar-cta-content text-center">
                <strong class="d-inline-block">
                    @foreach (get_locales() as $key => $locale)
                    @if (app()->getLocale() == $key)
                    {{ $locale }}
                    @else
                    <a href="{{ route('changeLocale', ['locale' => $key]) }}">{{ $locale }}</a>
                    @endif
                    @if (!$loop->last)
                    |
                    @endif
                    @endforeach
                </strong>
            </div>
        </div>

    </div>
</nav>
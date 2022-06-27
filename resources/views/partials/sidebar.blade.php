<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Jatos Builder</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">Pages</li>

            <li class="sidebar-item {{ set_active('/') }}">
                <a class="sidebar-link" href="{{ route('home') }}">
                    <i class="align-middle" data-feather="home"></i>
                    <span class="align-middle">Home</span>
                </a>
            </li>

            <li class="sidebar-header">Form Builder</li>

            <li class="sidebar-item {{ set_active('builder') }}">
                <a class="sidebar-link" href="{{ route('builder.index') }}">
                    <i class="align-middle" data-feather="database"></i>
                    <span class="align-middle">Projects</span>
                </a>
            </li>

            <li class="sidebar-item {{ set_active('builder/create') }}">
                <a class="sidebar-link" href="{{ route('builder.create') }}">
                    <i class="align-middle" data-feather="tool"></i>
                    <span class="align-middle">New Project</span>
                </a>
            </li>

            <li class="sidebar-header">Users</li>

            <li class="sidebar-item {{ set_active('users') }}">
                <a class="sidebar-link" href="{{ route('user.index') }}">
                    <i class="align-middle" data-feather="users"></i>
                    <span class="align-middle">Users</span>
                </a>
            </li>

            <li class="sidebar-item {{ set_active('user/create') }}">
                <a class="sidebar-link" href="{{ route('user.create') }}">
                    <i class="align-middle" data-feather="user-plus"></i>
                    <span class="align-middle">New User</span>
                </a>
            </li>

            <li class="sidebar-header">Tools & Components</li>

            <li class="sidebar-item {{ set_active('about') }}">
                <a class="sidebar-link" href="{{ route('about') }}">
                    <i class="align-middle" data-feather="help-circle"></i>
                    <span class="align-middle">About</span>
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

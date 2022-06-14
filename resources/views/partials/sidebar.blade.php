<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Jatos Builder</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">Pages</li>

            <li class="sidebar-item {{ set_active('/') }}">
                <div class="sidebar-link">
                    <a href="{{ route('home') }}">
                        <i class="align-middle" data-feather="home"></i>
                        <span class="align-middle">Home</span>
                    </a>
                </div>
            </li>
            <li class="sidebar-item {{ set_active('dashboard') }}">
                <div class="sidebar-link">
                    <a href="{{ route('dashboard') }}">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Dashboard</span>
                    </a>
                </div>
            </li>

            <li class="sidebar-header">Form Builder</li>

            <li class="sidebar-item {{ set_active('builder') }}">
                <div class="sidebar-link">
                    <a href="{{ route('builder.index') }}">
                        <i class="align-middle" data-feather="database"></i>
                        <span class="align-middle">Projects</span>
                    </a>
                </div>
            </li>

            <li class="sidebar-item {{ set_active('builder/new') }}">
                <div class="sidebar-link">
                    <a href="{{ route('builder.new') }}">
                        <i class="align-middle" data-feather="tool"></i>
                        <span class="align-middle">New Project</span>
                    </a>
                </div>
            </li>

            <li class="sidebar-header">Tools & Components</li>

            <li class="sidebar-item {{ set_active('about') }}">
                <div class="sidebar-link">
                    <a href="{{ route('about') }}">
                        <i class="align-middle" data-feather="help-circle"></i>
                        <span class="align-middle">About</span>
                    </a>
                </div>
            </li>
        </ul>
        <div class="text-center text-white mb-4">
            @foreach ( get_locales() as $key => $locale )
                @if(app()->getLocale() == $key)
                    {{ $locale }}
                @else
                    <a href="{{ route('changeLocale', ['locale' => $key]) }}">{{ $locale }}</a>
                @endif
                @if (!$loop->last)
                    |
                @endif
            @endforeach
        </div>
    </div>
</nav>

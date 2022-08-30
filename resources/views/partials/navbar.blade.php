<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            {{-- @include('partials.navbar-notifications') --}}
            {{-- @include('partials.navbar-messages') --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <span class="text-dark">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
                            data-feather="user"></i>{{ __('Profile') }}</a>

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="align-middle me-1"
                            data-feather="log-out"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="dropdown-item">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
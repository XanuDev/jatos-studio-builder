<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Jatos Builder</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">Pages</li>

            <li class="sidebar-item active">
                <div class="sidebar-link">
                    <a href="{{ route('home') }}">
                        <i class="align-middle" data-feather="home"></i>
                        <span class="align-middle">Home</span>
                    </a>
                </div>
            </li>
            <li class="sidebar-item">
                <div class="sidebar-link">
                    <a href="{{ route('home') }}">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Dashboard</span>
                    </a>
                </div>
            </li>

            <li class="sidebar-header">Form Builder</li>

            <li class="sidebar-item">
                <div class="sidebar-link">
                    <a href="{{ route('builder.new') }}">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">New Proyect</span>
                    </a>
                </div>
            </li>

            <li class="sidebar-header">Tools & Components</li>

            <li class="sidebar-item">
                <div class="sidebar-link">
                    <a href="{{ route('home') }}">
                        <i class="align-middle" data-feather="help-circle"></i>
                        <span class="align-middle">About</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{route('dashboard')}}" class="navbar-brand mx-4 mb-3">
            <h5 class="text-primary"><img src="{{asset('template/images/logo.png')}}" width="80px" alt=""></h5>
        </a>
        <div style="width: 40px; height: 40px;"></div>
        <div class="navbar-nav w-100">
            <a href="{{route('dashboard')}}" class="nav-item nav-link {{Route::currentRouteName() === 'dashboard' ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Acceuil</a>
            <a href="{{route('clients.index')}}" class="nav-item nav-link {{Route::currentRouteName() === 'clients.index' ? 'active' : '' }}"><i class="fa fa-users me-2"></i>Clients</a>
            <a href="{{route('invoices.index')}}" class="nav-item nav-link {{Route::currentRouteName() === 'invoices.index' ? 'active' : '' }}"><i class="fa fa-file-invoice me-2"></i>Factures</a>
            <a href="{{route('projects.index')}}" class="nav-item nav-link {{Route::currentRouteName() === 'projects.index' ? 'active' : '' }}"><i class="fa fa-table me-2"></i>Projets</a>
            <a href="{{route('settings.index')}}"
                class="nav-item nav-link {{Route::currentRouteName() === 'settings.index' ? 'active' : '' }}"><i
                    class="fa fa-bars me-2"></i>Paramètres</a>
            {{-- <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Elements</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="button.html" class="dropdown-item">Buttons</a>
                    <a href="typography.html" class="dropdown-item">Typography</a>
                    <a href="element.html" class="dropdown-item">Other Elements</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">Sign In</a>
                    <a href="signup.html" class="dropdown-item">Sign Up</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                    <a href="blank.html" class="dropdown-item">Blank Page</a>
                </div>
            </div> --}}
        </div>
    </nav>
</div>
<!-- Sidebar End -->
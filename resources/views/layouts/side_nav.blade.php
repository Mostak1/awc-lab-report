<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav text-primary-emphasis aw-bg sidebar text-success-emphasis " id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav mt-2 side-nav">
                @php
                    $user = Auth::guard('web')->user();
                @endphp
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3 fs-1 text-warning" target="" href="{{ url('/') }}"><img width="150px"
                        src="{{ asset(config('app.logo_path')) }}" alt="Logo">
                </a>
                <div class="sb-sidenav-menu-heading clr">Core</div>
                <a class="nav-link" href="{{ url('/') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading clr">Interface</div>

                {{-- @endhasanyrole --}}


                <div class="sb-sidenav-menu-heading clr">Report</div>
                {{-- @dd($roles) --}}
                {{-- @if ($user->can('users.index')) --}}
                    <a class="nav-link" href="{{ url('patients') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-injured"></i></div>
                        patients
                    </a>

                    <a class="nav-link" href="{{ url('reports') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                        reports
                    </a>
                {{-- @endif

                <div class="sb-sidenav-menu-heading clr">Report</div>
                {{-- @dd($roles) --}}
                {{-- @if ($user->can('users.index')) --}}
                    <a class="nav-link" href="{{ url('users') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Users
                    </a>
                {{-- @endif

                @if ($user->can('roles.index')) --}}
                    <a class="nav-link" href="{{ url('admins') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        User Role Set
                    </a>
                {{-- @endif

                @if ($user->can('roles.index')) --}}
                    <a class="nav-link" href="{{ url('roles') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Permissions Set On Role
                    </a>
                {{-- @endif
                @if ($user->can('permissions.index')) --}}
                    <a class="nav-link" href="{{ url('permissions') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Permissions
                    </a>
                {{-- @endif --}}
        </div>
        <div class="sb-sidenav-footer clr">
            <div class="small">Logged in as:</div>

            @if (Auth::check())
                {{ Auth::user()->name }}
            @endif
        </div>
        <div hidden class=" clr">Copyright &copy; <a href="https://mostaksarker.com/" class="nav-link" target="_blank" rel="noopener noreferrer"> AWC Lab 2024</a></div>
    </nav>
</div>

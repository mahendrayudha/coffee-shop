<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="{{route('dashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/admin/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/admin/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <a href="{{route('dashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/admin/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/admin/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span data-key="t-menu">Menu</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('dashboard')}}" class="nav-link" data-key="t-analytics">
                                    Analytics
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                <li class="menu-title">
                    <i class="ri-more-fill"></i>
                    <span data-key="t-master-data">Master Data</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('comingSoon') }}">
                        <i class="mdi mdi-puzzle-outline"></i>
                        <span data-key="t-product">Product</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>

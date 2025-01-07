<div class="nk-sidebar" data-content="sidebarMenu">
    <div class="nk-sidebar-inner" data-simplebar>
        <ul class="nk-menu nk-menu-md">
            <li class="nk-menu-item">
                <a href="{{route('admin-dashboard.dashboard')}}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                    <span class="nk-menu-text">Dashboard</span>
                </a>
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-item has-sub">
                <a href="#" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                    <span class="nk-menu-text">Users Management</span>
                </a>
                <ul class="nk-menu-sub">
                    <li class="nk-menu-item">
                        <a href="{{route('admin-dashboard.users.index')}}" class="nk-menu-link"><span class="nk-menu-text">All Users</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('admin-dashboard.users.create')}}" class="nk-menu-link"><span class="nk-menu-text">Create User</span></a>
                    </li>
                </ul><!-- .nk-menu-sub -->
            </li><!-- .nk-menu-item -->
        </ul><!-- .nk-menu -->
    </div>
</div>

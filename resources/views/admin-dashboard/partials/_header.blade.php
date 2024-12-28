<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-app-name">
                <div class="nk-header-app-logo">
                    <em class="icon ni ni-dashlite bg-purple-dim"></em>
                </div>
                <div class="nk-header-app-info">
                    <span class="sub-text">DashLite</span>
                    <span class="lead-text">Dashboard</span>
                </div>
            </div>
            <div class="nk-header-menu is-light">
                <div class="nk-header-menu-inner">
                    <!-- Menu -->
                    <ul class="nk-menu nk-menu-main">
                        <li class="nk-menu-item">
                            <a href="html/index.html" class="nk-menu-link">
                                <span class="nk-menu-text">Overview</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="html/components.html" class="nk-menu-link">
                                <span class="nk-menu-text">Components</span>
                            </a>
                        </li>
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-text">Use-Case Panel</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="/demo2/ecommerce/index.html" class="nk-menu-link"><span class="nk-menu-text">eCommerce Panel</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/demo3/apps/file-manager.html" class="nk-menu-link"><span class="nk-menu-text">File Manangement Panel</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/demo4/subscription/index.html" class="nk-menu-link"><span class="nk-menu-text">Subscription Panel</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/demo5/crypto/index.html" class="nk-menu-link"><span class="nk-menu-text">Crypto Buy Sell Panel</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/demo6/invest/index.html" class="nk-menu-link"><span class="nk-menu-text">HYIP Investment Panel</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                    </ul>
                    <!-- Menu -->
                </div>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>AB</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{auth()->user()->name}}</span>
                                        <span class="sub-text">{{auth()->user()->email}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                </ul>
                                <form id="logout-form" action="{{ route('admin-dashboard.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

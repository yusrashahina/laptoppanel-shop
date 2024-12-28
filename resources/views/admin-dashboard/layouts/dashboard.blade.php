<!DOCTYPE html>
<html lang="zxx" class="js">
@include('admin-dashboard.partials._head')
<body class="nk-body npc-default has-apps-sidebar has-sidebar ">
    <div class="nk-app-root">
        @include('admin-dashboard.partials._mini-sidebar')
        <div class="nk-main ">
            <div class="nk-wrap ">
                @include('admin-dashboard.partials._header')
                @include('admin-dashboard.partials._sidebar')
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stack('modal')
    @include('admin-dashboard.partials._scripts')
</body>
</html>

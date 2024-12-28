<!DOCTYPE html>
<html lang="zxx" class="js">
@include('admin-dashboard.partials._head')
<body class="nk-body npc-default pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('admin-dashboard.partials._scripts')
    @stack('modal')
</body>
</html>

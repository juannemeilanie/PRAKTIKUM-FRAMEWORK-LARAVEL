<!doctype html>
<html lang="en">
    <!--begin::Head-->
    @include('layouts.lte.head')
    <!--end::Head-->
    <!--begin::Body-->
    <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
        <div class="app-wrapper">
            <!--begin::Navbar-->
            @php
                $roleId = session('user_role');
            @endphp
            
            @switch($roleId)
                @case(1)
                    @include('layouts.lte.navbar-admin')
                    @break
                @case(2)
                    @include('layouts.lte.navbar-dokter')
                    @break
                @case(3)
                    @include('layouts.lte.navbar-perawat')
                    @break
                @case(4)
                    @include('layouts.lte.navbar-resepsionis')
                    @break
                @default
                    @include('layouts.lte.navbar-pemilik')
            @endswitch
            <!--end::Navbar-->
            <!--begin::Sidebar-->

            @switch($roleId)
                @case(1)
                    @include('layouts.lte.sidebar-admin')
                    @break
                @case(2)
                    @include('layouts.lte.sidebar-dokter')
                    @break
                @case(3)
                    @include('layouts.lte.sidebar-perawat')
                    @break
                @case(4)
                    @include('layouts.lte.sidebar-resepsionis')
                    @break
                @default
                    @include('layouts.lte.sidebar-pemilik')
            @endswitch

            <!--end::Sidebar-->
            <!--begin::App Main-->
            <main class="app-main">
                
                @yield('content')
                
            </main>
            <!--end::App Main-->
            <!--begin::Footer-->
            @include('layouts.lte.footer')
            <!--end::Footer-->
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
            crossorigin="anonymous"
        ></script>
        
        <script src="{{ asset('assets/js/adminlte.js') }}"></script>
        <script>
            const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
            const Default = {
                scrollbarTheme: 'os-theme-light',
                scrollbarAutoHide: 'leave',
                scrollbarClickScroll: true,
            };
            document.addEventListener('DOMContentLoaded', function () {
                const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
                if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
                    OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                        scrollbars: {
                            theme: Default.scrollbarTheme,
                            autoHide: Default.scrollbarAutoHide,
                            clickScroll: Default.scrollbarClickScroll,
                        },
                    });
                }
            });
        </script>
        
        <script
            src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
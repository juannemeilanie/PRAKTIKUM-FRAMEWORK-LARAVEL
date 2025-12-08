<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
                src="{{ asset('assets/img/AdminLTELogo.png') }}"
                alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">RSHP</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="navigation"
                aria-label="Main navigation"
                data-accordion="false"
                id="navigation"
            >
            
                <li class="nav-item menu-open">
                    <a href="{{ route('pemilik.dashboard') }}" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">HEWAN</li>
                <li class="nav-item">
                    <a href="{{ route('pemilik.data-pet.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-hearts"></i>
                        <p>Hewan Peliharaan</p>
                    </a>
                </li>

                <li class="nav-header">LAYANAN</li>
                <li class="nav-item">
                    <a href="{{ route('pemilik.temu-dokter.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-calendar-check-fill"></i>
                        <p>Jadwal Temu</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pemilik.rekam-medis.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-clipboard2-pulse-fill"></i>
                        <p>Riwayat Medis</p>
                    </a>
                </li>

                <li class="nav-header">SYSTEM</li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-start w-100">
                            <i class="nav-icon bi bi-box-arrow-right"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </li>

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->

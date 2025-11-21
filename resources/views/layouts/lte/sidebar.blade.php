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
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Master Data
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.jenis-hewan.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Jenis Hewan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.ras-hewan.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Ras Hewan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.pemilik.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Data Pemilik</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.pet.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Data Pet</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.kategori.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Data Kategori</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.kategori-klinis.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Data Kategori Kliniss</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.kode-tindakan.index') }}"  class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Kode Tindakan Terapi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.dokter.index') }}"  class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Data Dokter</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.perawat.index') }}"  class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Data Perawat</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>
                            Manajemen User
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                    
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Data User</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.user-role.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Manajemen Role</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
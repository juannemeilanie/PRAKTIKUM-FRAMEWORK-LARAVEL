@php
    $perawat = DB::table('perawat')
        ->where('iduser', Auth::user()->iduser)
        ->first();
@endphp

<!--begin::Header-->
<nav class="app-header navbar navbar-expand bg-body">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Start Navbar Links-->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
          <i class="bi bi-list"></i>
        </a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <!--end::Start Navbar Links-->

    <!--begin::End Navbar Links-->
    <ul class="navbar-nav ms-auto">
      <!--begin::Navbar Search-->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="bi bi-search"></i>
        </a>
      </li>
      <!--end::Navbar Search-->

      <!--begin::Fullscreen Toggle-->
      <li class="nav-item">
        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
          <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
          <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
        </a>
      </li>
      <!--end::Fullscreen Toggle-->

      <!--begin::User Menu Dropdown-->
      
      <!--begin::User Menu Dropdown-->
      <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <span class="d-none d-md-inline">{{ Auth::user()->nama }}</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

              <!-- Profile Header -->
              <li class="user-body text-center  py-2 px-3">
                  <p class="mb-1 fw-bold">
                      {{ Auth::user()->nama }} - Perawat
                  </p>

                  <big>{{ $perawat->pendidikan}}</big><br>
                  <small class="text-muted">Member since Februari 2025</small>
              </li>
              <!-- Info Tambahan -->
              <li class="user-body text-muted py-2 px-3">
                  <div><strong>Email:</strong> {{ Auth::user()->email }}</div>
                  <div><strong>Alamat:</strong> {{ $perawat->alamat ?? '-' }}</div>
                  <div><strong>No HP:</strong> {{ $perawat->no_hp ?? '-' }}</div>
                  <div><strong>Jenis Kelamin:</strong> {{ $perawat->jenis_kelamin ?? '-' }}</div>
              </li>
          </ul>
      </li>

      <!--end::User Menu Dropdown-->
    </ul>
    <!--end::End Navbar Links-->
  </div>
  <!--end::Container-->
</nav>
<!--end::Header-->

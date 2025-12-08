@php

    $pemilik = DB::table('pemilik')
        ->where('iduser', Auth::user()->iduser)
        ->first();
@endphp

<!--begin::Header-->
<nav class="app-header navbar navbar-expand bg-body">
  <div class="container-fluid">
    
    <!-- Left Side -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
          <i class="bi bi-list"></i>
        </a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right Side -->
    <ul class="navbar-nav ms-auto">

      <!-- Fullscreen -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
          <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
          <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display:none;"></i>
        </a>
      </li>

      <!-- User Dropdown -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <span class="d-none d-md-inline">{{ Auth::user()->nama }}</span>
        </a>

        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

          <!-- Profile Header -->
          <li class="user-body text-center py-2 px-3">
            <p class="mb-1 fw-bold">
              {{ Auth::user()->nama }} 
              - {{ $pemilik ? 'Pemilik' : 'User' }}
            </p>
            <small class="text-muted">Member since Oktober 2025</small>
          </li>

          <!-- Info Tambahan -->
          <li class="user-body text-muted py-2 px-3">
              <div><strong>Email:</strong> {{ Auth::user()->email }}</div>
              <div><strong>Alamat:</strong> {{ $pemilik->alamat ?? '-' }}</div>
              <div><strong>No HP:</strong> {{ $pemilik->no_wa ?? '-' }}</div>
          </li>

        </ul>
      </li>

    </ul>

  </div>
</nav>
<!--end::Header-->

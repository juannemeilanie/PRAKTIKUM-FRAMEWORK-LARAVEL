@extends('layouts.lte.main')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard RSHP</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row - Info boxes-->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-success shadow-sm">
                            <i class="bi bi-heart-pulse-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Hewan</span>
                            <span class="info-box-number">{{ $totalPet }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-warning shadow-sm">
                            <i class="bi bi-people-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Pemilik</span>
                            <span class="info-box-number">{{ $totalPemilik }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-danger shadow-sm">
                            <i class="bi bi-person-badge-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total User</span>
                            <span class="info-box-number">{{ $totalUser }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row - Recent Records-->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Pet</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pet</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Warna Tanda</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Pemilik</th>
                                            <th>Ras Hewan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pets as $index => $pet)
                                        <tr>
                                            <td>{{ $pet->nama }}</td>
                                            <td>{{ $pet->tanggal_lahir }}</td>
                                            <td>{{ $pet->warna_tanda }}</td>
                                            <td>{{ $pet->jenis_kelamin }}</td>
                                            <td>{{ $pet->nama_pemilik }}</td>
                                            <td>{{ $pet->nama_ras }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ route('admin.pet.edit', $pet->idpet) }}'">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $pet->idpet }}').submit(); }">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                                <form id="delete-form-{{ $pet->idpet }}" action="{{ route('admin.pet.destroy', $pet->idpet) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>                    
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="#" class="btn btn-sm btn-primary float-end">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row - Statistics-->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Jenis Hewan</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jenis Hewan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jenisHewan as $index => $hewan)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $hewan->nama_jenis_hewan }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                                <div class="card-footer clearfix">
                                    <a href="{{ route('admin.jenis-hewan.index') }}" class="btn btn-sm btn-primary float-end">Lihat Semua</a>
                                </div>
                            </div>
                        </div>
                    </div>
                

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User</h3>
                        </div>
                        <div class="card-body">
                            
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama User</th>
                                    <th>Nama Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roleUser as $index => $userRole)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $userRole->nama }}</td>
                                    <td>{{ $userRole->nama_role }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="{{ route('admin.user-role.index') }}" class="btn btn-sm btn-primary float-end">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
@extends('layout.admin')

@section('content-admin')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.persetujuan') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">View Proposal</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <form action="{{ route('admin.updateStatus', $proposal->id) }}" method="POST" class="row g-3 needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="col-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            Proposal
                        </div>
                        <div class="card-body">
                            @foreach ([
                                'user_nidn' => 'User NIDN',
                                'id_skema' => 'ID Skema',
                                'judul' => 'Judul',
                                'nama_mitra' => 'Nama Mitra',
                                'alamat_mitra' => 'Alamat Mitra',
                                'kata_kunci' => 'Kata Kunci',
                                'latar_belakang' => 'Latar Belakang',
                                'ringkasan' => 'Ringkasan',
                                'urgensi' => 'Urgensi',
                                'rumusan_masalah' => 'Rumusan Masalah',
                                'pendekatan_pemecahan_masalah' => 'Pendekatan Pemecahan Masalah',
                                'kebaruan' => 'Kebaruan',
                                'metode_penelitian' => 'Metode Penelitian',
                                'jadwal_penelitian' => 'Jadwal Penelitian',
                                'daftar_pustaka' => 'Daftar Pustaka',
                                'status' => 'Status',
                                'nilai' => 'Nilai',
                                'tanggal_submit' => 'Tanggal Submit',
                                'laporan_progress' => 'Laporan Progress',
                                'laporan_akhir' => 'Laporan Akhir'
                            ] as $field => $label)
                                <div class="form-group">
                                    <label for="{{ $field }}">{{ $label }}</label>
                                    <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control" value="{{ $proposal->$field ?? '' }}" readonly>
                                    <div class="invalid-feedback">Please, enter the {{ strtolower($label) }}!</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Status Proposal</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-success {{ $proposal->status_approvel == 'diterima' ? 'active' : '' }}">
                                        <input type="radio" name="status" value="diterima" {{ $proposal->status_approvel == 'diterima' ? 'checked' : '' }}>
                                        Diterima
                                    </label>
                                    <label class="btn btn-outline-danger {{ $proposal->status_approvel == 'ditolak' ? 'active' : '' }}">
                                        <input type="radio" name="status" value="ditolak" {{ $proposal->status_approvel == 'ditolak' ? 'checked' : '' }}>
                                        Ditolak
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Confirm</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

<style>
    .btn-group-toggle .btn.active {
        background-color: green;
        color: white;
        border-color: green;
    }

    .btn-group-toggle .btn-outline-danger.active {
        background-color: red;
        color: white;
        border-color: red;
    }
</style>

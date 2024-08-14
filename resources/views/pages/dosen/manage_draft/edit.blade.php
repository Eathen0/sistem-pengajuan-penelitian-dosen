@extends('layout.dosen-page')

@section('content-dosen')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Proposal Draft</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('proposals.index') }}">Proposal Drafts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Proposal Draft</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <!-- Form start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('proposals.update', $proposal->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- User NIDN -->
                            <div class="form-group">
                                <label for="user_nidn">NIDN Pengguna</label>
                                <input type="text" id="user_nidn" class="form-control" name="user_nidn" value="{{ old('user_nidn', $proposal->user_nidn) }}" required>
                            </div>

                            <!-- ID Skema -->
                            <div class="form-group">
                                <label for="id_skema">ID Skema</label>
                                <input type="number" id="id_skema" class="form-control" name="id_skema" value="{{ old('id_skema', $proposal->id_skema) }}" required>
                            </div>

                            <!-- Judul -->
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" id="judul" class="form-control" name="judul" value="{{ old('judul', $proposal->judul) }}" required>
                            </div>

                            <!-- Nama Mitra -->
                            <div class="form-group">
                                <label for="nama_mitra">Nama Mitra</label>
                                <input type="text" id="nama_mitra" class="form-control" name="nama_mitra" value="{{ old('nama_mitra', $proposal->nama_mitra) }}" required>
                            </div>

                            <!-- Alamat Mitra -->
                            <div class="form-group">
                                <label for="alamat_mitra">Alamat Mitra</label>
                                <textarea id="alamat_mitra" class="form-control" name="alamat_mitra" required>{{ old('alamat_mitra', $proposal->alamat_mitra) }}</textarea>
                            </div>

                            <!-- Kata Kunci -->
                            <div class="form-group">
                                <label for="kata_kunci">Kata Kunci</label>
                                <textarea id="kata_kunci" class="form-control" name="kata_kunci" required>{{ old('kata_kunci', $proposal->kata_kunci) }}</textarea>
                            </div>

                            <!-- Latar Belakang -->
                            <div class="form-group">
                                <label for="latar_belakang">Latar Belakang</label>
                                <textarea id="latar_belakang" class="form-control" name="latar_belakang" required>{{ old('latar_belakang', $proposal->latar_belakang) }}</textarea>
                            </div>

                            <!-- Ringkasan -->
                            <div class="form-group">
                                <label for="ringkasan">Ringkasan</label>
                                <textarea id="ringkasan" class="form-control" name="ringkasan" required>{{ old('ringkasan', $proposal->ringkasan) }}</textarea>
                            </div>

                            <!-- Urgensi -->
                            <div class="form-group">
                                <label for="urgensi">Urgensi</label>
                                <textarea id="urgensi" class="form-control" name="urgensi" required>{{ old('urgensi', $proposal->urgensi) }}</textarea>
                            </div>

                            <!-- Rumusan Masalah -->
                            <div class="form-group">
                                <label for="rumusan_masalah">Rumusan Masalah</label>
                                <textarea id="rumusan_masalah" class="form-control" name="rumusan_masalah" required>{{ old('rumusan_masalah', $proposal->rumusan_masalah) }}</textarea>
                            </div>

                            <!-- Pendekatan Pemecahan Masalah -->
                            <div class="form-group">
                                <label for="pendekatan_pemecahan_masalah">Pendekatan Pemecahan Masalah</label>
                                <textarea id="pendekatan_pemecahan_masalah" class="form-control" name="pendekatan_pemecahan_masalah" required>{{ old('pendekatan_pemecahan_masalah', $proposal->pendekatan_pemecahan_masalah) }}</textarea>
                            </div>

                            <!-- Kebaruan -->
                            <div class="form-group">
                                <label for="kebaruan">Kebaruan</label>
                                <textarea id="kebaruan" class="form-control" name="kebaruan" required>{{ old('kebaruan', $proposal->kebaruan) }}</textarea>
                            </div>

                            <!-- Metode Penelitian -->
                            <div class="form-group">
                                <label for="metode_penelitian">Metode Penelitian</label>
                                <textarea id="metode_penelitian" class="form-control" name="metode_penelitian" required>{{ old('metode_penelitian', $proposal->metode_penelitian) }}</textarea>
                            </div>

                            <!-- Jadwal Penelitian -->
                            <div class="form-group">
                                <label for="jadwal_penelitian">Jadwal Penelitian</label>
                                <textarea id="jadwal_penelitian" class="form-control" name="jadwal_penelitian" required>{{ old('jadwal_penelitian', $proposal->jadwal_penelitian) }}</textarea>
                            </div>

                            <!-- Daftar Pustaka -->
                            <div class="form-group">
                                <label for="daftar_pustaka">Daftar Pustaka</label>
                                <textarea id="daftar_pustaka" class="form-control" name="daftar_pustaka" required>{{ old('daftar_pustaka', $proposal->daftar_pustaka) }}</textarea>
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="form-control" name="status" required>
                                    <option value="draf" {{ old('status', $proposal->status) == 'draf' ? 'selected' : '' }}>Draft</option>
                                    <option value="submitted" {{ old('status', $proposal->status) == 'submitted' ? 'selected' : '' }}>Submitted</option>
                                </select>
                            </div>

                            <!-- Status Approval -->
                            <div class="form-group">
                                <label for="status_approvel">Status Approval</label>
                                <select id="status_approvel" class="form-control" name="status_approvel" required>
                                    <option value="diterima" {{ old('status_approvel', $proposal->status_approvel) == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                    <option value="ditolak" {{ old('status_approvel', $proposal->status_approvel) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </div>

                            <!-- Nilai -->
                            <div class="form-group">
                                <label for="nilai">Nilai</label>
                                <input type="number" id="nilai" class="form-control" name="nilai" value="{{ old('nilai', $proposal->nilai) }}">
                            </div>

                            <!-- Tanggal Submit -->
                            <div class="form-group">
                                <label for="tanggal_submit">Tanggal Submit</label>
                                <input type="date" id="tanggal_submit" class="form-control" name="tanggal_submit" value="{{ old('tanggal_submit', $proposal->tanggal_submit) }}">
                            </div>

                            <!-- Approval Date -->
                            <div class="form-group">
                                <label for="approvel_date">Approval Date</label>
                                <input type="date" id="approvel_date" class="form-control" name="approvel_date" value="{{ old('approvel_date', $proposal->approvel_date) }}">
                            </div>

                            <!-- Laporan Progress -->
                            <div class="form-group">
                                <label for="laporan_progress">Laporan Progress</label>
                                <textarea id="laporan_progress" class="form-control" name="laporan_progress">{{ old('laporan_progress', $proposal->laporan_progress) }}</textarea>
                            </div>

                            <!-- Laporan Akhir -->
                            <div class="form-group">
                                <label for="laporan_akhir">Laporan Akhir</label>
                                <textarea id="laporan_akhir" class="form-control" name="laporan_akhir">{{ old('laporan_akhir', $proposal->laporan_akhir) }}</textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update Proposal</button>
                                <a href="{{ route('proposals.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form end -->
</div>

<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2024 &copy; Voler</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="https://saugi.me">Saugi</a></p>
        </div>
    </div>
</footer>
@endsection

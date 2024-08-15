@extends('layout.dosen-page')

@section('content-dosen')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Proposal</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Proposal</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section proposal">
        <div class="col-md-12">
            <form action="{{ route('manage_proposal.store') }}" method="POST" class="card card-body needs-validation">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <!-- User NIDN -->
                        <div class="form-group">
                            <label for="user_nidn">User NIDN</label>
                            <select name="user_nidn" id="user_nidn" class="form-control">
                                <option value="">Pilih...</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->nidn }}">{{ $user->name }} ({{ $user->nidn }})</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Skema -->
                        <div class="form-group">
                            <label for="id_skema">Skema</label>
                            <select name="id_skema" id="id_skema" class="form-control">
                                @foreach($skemas as $skema)
                                    <option value="{{ $skema->id }}">{{ $skema->nama_skema }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Judul -->
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukan judul" required>
                            <div class="invalid-feedback">Please, isi judul proposal</div>
                        </div>

                        <!-- Nama Mitra -->
                        <div class="form-group">
                            <label for="nama_mitra">Nama Mitra</label>
                            <input type="text" name="nama_mitra" id="nama_mitra" class="form-control" placeholder="Masukan nama Mitra" required>
                            <div class="invalid-feedback">Please, isi nama mitra</div>
                        </div>

                        <!-- Alamat Mitra -->
                        <div class="form-group">
                            <label for="alamat_mitra">Alamat Mitra</label>
                            <textarea class="form-control" id="alamat_mitra" name="alamat_mitra" placeholder="Masukan alamat mitra" required></textarea>
                        </div>

                        <!-- Kata Kunci -->
                        <div class="form-group">
                            <label for="kata_kunci">Kata Kunci</label>
                            <input type="text" name="kata_kunci" id="kata_kunci" class="form-control" placeholder="Masukan kata kunci" required>
                            <div class="invalid-feedback">Please, masukan kata kunci</div>
                        </div>

                        <!-- Latar Belakang -->
                        <div class="form-group">
                            <label for="latar_belakang">Latar Belakang</label>
                            <textarea name="latar_belakang" id="latar_belakang" class="form-control" rows="5" placeholder="Masukan Latar Belakang" required></textarea>
                        </div>

                        <!-- Ringkasan -->
                        <div class="form-group">
                            <label for="ringkasan">Ringkasan</label>
                            <textarea name="ringkasan" id="ringkasan" class="form-control" rows="3" placeholder="Masukan Ringkasan" required></textarea>
                        </div>

                        <!-- Urgensi -->
                        <div class="form-group">
                            <label for="urgensi">Urgensi</label>
                            <textarea name="urgensi" id="urgensi" class="form-control" placeholder="Masukan urgensi" required></textarea>
                        </div>

                        <!-- Rumusan Masalah -->
                        <div class="form-group">
                            <label for="rumusan_masalah">Rumusan Masalah</label>
                            <textarea name="rumusan_masalah" id="rumusan_masalah" class="form-control" rows="4" placeholder="Masukan rumusan masalah" required></textarea>
                        </div>

                        <!-- Pendekatan Pemecahan Masalah -->
                        <div class="form-group">
                            <label for="pendekatan_pemecahan_masalah">Pendekatan Pemecahan Masalah</label>
                            <textarea name="pendekatan_pemecahan_masalah" id="pendekatan_pemecahan_masalah" class="form-control" rows="3" placeholder="Masukan pendekatan pemecahan masalah" required></textarea>
                        </div>

                        <!-- Kebaruan -->
                        <div class="form-group">
                            <label for="kebaruan">Kebaruan</label>
                            <textarea name="kebaruan" id="kebaruan" class="form-control" rows="3" placeholder="Masukan kebaruan" required></textarea>
                        </div>

                        <!-- Metode Penelitian -->
                        <div class="form-group">
                            <label for="metode_penelitian">Metode Penelitian</label>
                            <textarea name="metode_penelitian" id="metode_penelitian" class="form-control" rows="5" placeholder="Masukan metode penelitian" required></textarea>
                        </div>

                        <!-- Jadwal Penelitian -->
                        <div class="form-group">
                            <label for="jadwal_penelitian">Jadwal Penelitian</label>
                            <textarea name="jadwal_penelitian" id="jadwal_penelitian" class="form-control"></textarea>
                        </div>

                        <!-- Daftar Pustaka -->
                        <div class="form-group">
                            <label for="daftar_pustaka">Daftar Pustaka</label>
                            <textarea name="daftar_pustaka" id="daftar_pustaka" class="form-control" rows="4" placeholder="Masukan daftar pusaka" required></textarea>
                        </div>

                        <!-- Status -->
                        <input type="hidden" name="status" value="draft">

                        <!-- Laporan Progres -->
                        <div class="form-group">
                            <label for="laporan_progres">Laporan Progres</label>
                            <textarea name="laporan_progres" id="laporan_progres" class="form-control"></textarea>
                        </div>

                        <!-- Laporan Akhir -->
                        <div class="form-group">
                            <label for="laporan_akhir">Laporan Akhir</label>
                            <textarea name="laporan_akhir" id="laporan_akhir" class="form-control"></textarea>
                        </div>

                        <!-- Tim Section -->
                        <h3>Tim</h3>
                        <div id="tim-sections">
                            <div class="tim-group">
                                <!-- Nama Anggota -->
                                <div class="form-group">
                                    <label for="nama_anggota">Nama Anggota</label>
                                    <input type="text" name="tim[0][nama_anggota]" id="nama_anggota" class="form-control">
                                </div>

                                <!-- Tugas -->
                                <div class="form-group">
                                    <label for="tugas">Tugas</label>
                                    <input type="text" name="tim[0][tugas]" id="tugas" class="form-control">
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option>Pilih...</option>
                                        <option value="Ketua">Ketua</option>
                                        <option value="Anggota">Anggota</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" id="add-tim" class="btn btn-secondary">Tambah Tim</button>
                        </div>
                        <br>
                        <!-- Capaian Section -->
                        <h3>Capaian</h3>
                        <div id="capaian-sections">
                            <div class="capaian-group">
                                <!-- Tahun -->
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="text" name="capaian[0][tahun]" id="tahun" class="form-control">
                                </div>

                                <!-- Jenis Capaian -->
                                <div class="form-group">
                                    <label for="jenis_capaian">Jenis Capaian</label>
                                    <select class="form-select" id="jenis_capaian" name="jenis_capaian" required>
                                        <option>Pilih...</option>
                                        <option value="HKI">HKI</option>
                                        <option value="Buku Ajar">Buku Ajar</option>
                                        <option value="Naskah Jurnal">Naskah Jurnal</option>
                                    </select>
                                </div>

                                <!-- Indikator -->
                                <div class="form-group">
                                    <label for="indikator">Indikator</label>
                                    <input type="text" name="capaian[0][indikator]" id="indikator" class="form-control">
                                </div>
                                <button type="button" id="add-capaian" class="btn btn-secondary">Tambah Capaian</button>
                            </div>
                        </div>
                        <br><br>
                        <!-- Submit -->
                        <div class="form-group mt4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<script>
    let timIndex = 1;
    let capaianIndex = 1;

    document.getElementById('add-tim').addEventListener('click', function() {
        let timSection = document.createElement('div');
        timSection.classList.add('tim-group');

        timSection.innerHTML = `
            <div class="form-group">
                <label for="nama_anggota">Nama Anggota</label>
                <input type="text" name="tim[${timIndex}][nama_anggota]" id="nama_anggota" class="form-control">
            </div>
            <div class="form-group">
                <label for="tugas">Tugas</label>
                <input type="text" name="tim[${timIndex}][tugas]" id="tugas" class="form-control">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="tim[${timIndex}][status]" id="status" class="form-control">
                    <option value="ketua">Ketua</option>
                    <option value="anggota">Anggota</option>
                </select>
            </div>
        `;

        document.getElementBy
        Id('tim-sections').appendChild(timSection);
    timIndex++;
    document.getElementById('add-capaian').addEventListener('click', function() {
        let capaianSection = document.createElement('div');
        capaianSection.classList.add('capaian-group');

        capaianSection.innerHTML = `
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" name="capaian[${capaianIndex}][tahun]" id="tahun" class="form-control">
            </div>
            <div class="form-group">
                <label for="jenis_capaian">Jenis Capaian</label>
                <select name="capaian[${capaianIndex}][jenis_capaian]" id="jenis_capaian" class="form-control">
                    <option value="HKI">HKI</option>
                    <option value="Buku Ajar">Buku Ajar</option>
                    <option value="Naskah Jurnal">Naskah Jurnal</option>
                </select>
            </div>
            <div class="form-group">
                <label for="indikator">Indikator</label>
                <input type="text" name="capaian[${capaianIndex}][indikator]" id="indikator" class="form-control">
            </div>
        `;

        document.getElementById('capaian-sections').appendChild(capaianSection);
        capaianIndex++;
    });
</script>
@endsection
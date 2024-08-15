@extends('layout.dosen-page')

@section('content-dosen')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Luaran/Capaian</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Capaian/Luaran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section capaian">
            <div class="col-md-12">
                <form action="{{ route('manage_luaran.store') }}" method="post" class="card card-body needs-validation">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id_proposal">Judul Proposal</label>
                                <small class="text-muted">as.<i>Id Proposal</i></small>
                                <select class="choices form-select" id="id_proposal" name="id_proposal" required>
                                    <option value="">Pilih...</option>
                                    @foreach ($proposal as $pol)
                                        <option value="{{ $pol->id }}">{{ $pol->judul }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Pilih judul proposal.</div>
                            </div>

                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="number" class="form-control" id="tahun" name="tahun"
                                       value="{{ old('tahun') }}" placeholder="Tahun" required
                                       min="1000" max="9999">
                                <div class="invalid-feedback">Masukkan tahun yang valid (4 digit).</div>
                            </div>

                            <div class="form-group">
                                <label for="jenis_capaian">Jenis Capaian</label>
                                <select class="form-select" id="jenis_capaian" name="jenis_capaian" required>
                                    <option value="">Pilih...</option>
                                    <option value="HKI">HKI</option>
                                    <option value="Naskah Jurnal">Naskah Jurnal</option>
                                    <option value="Buku Ajar">Buku Ajar</option>
                                </select>
                                <div class="invalid-feedback">Pilih jenis capaian.</div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="indikator">Indikator</label>
                                <textarea class="form-control" id="indikator" name="indikator" rows="4" required></textarea>
                                <div class="invalid-feedback">Masukkan indikator capaian.</div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

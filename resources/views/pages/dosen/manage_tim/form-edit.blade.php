@extends('layout.dosen-page')

@section('content-dosen')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Tim</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tim</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section tim">
            <div class="col-md-12">
                <form action="{{ route('manage_tim.store') }}" method="post" class="card card-body needs-validation">
                    @csrf
                    <div class="row col-md-6">
                        <div class="form-group">
                            <label for="id_proposal">Judul Proposal</label>
                            <small class="text-muted">as.<i>Id Proposal</i></small>
                            <select class="choices form-select" id="id_proposal" name="id_proposal" required>
                                <option value="">Pilih...</option>
                                @foreach ($proposal as $pol)
                                    <option value="{{ $pol->id }}">{{ $pol->judul }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama') }}" placeholder="Name" required>
                            <div class="invalid-feedback">Please, enter your name!</div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tugas">Tugas</label>
                            <textarea class="form-control" id="tugas" name="tugas" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option>Pilih...</option>
                                <option>Ketua</option>
                                <option>Anggota</option>
                            </select>
                            {{-- <p><small class="text-muted">Find helper text here for given textbox.</small></p> --}}
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

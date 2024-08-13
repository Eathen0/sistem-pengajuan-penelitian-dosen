@extends('layout.dosen-page')

@section('content-dosen')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Tim</h3>
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
                <form action="{{ route('manage_tim.update', $tim->id) }}" method="post" class="card card-body needs-validation">
                    @csrf
                    @method('PUT')
                    <div class="row col-md-6">
                        <div class="form-group">
                            <label for="id_proposal">Judul Proposal</label>
                            <small class="text-muted">as.<i>Id Proposal</i></small>
                            <select class="choices form-select" id="id_proposal" name="id_proposal" required>
                                <option value="">Pilih...</option>
                                @foreach ($proposals as $proposal)
                                    <option value="{{ $proposal->id }}" {{ $proposal->id == $tim->id_proposal ? 'selected' : '' }}>
                                        {{ $proposal->judul }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama', $tim->nama) }}" placeholder="Name" required>
                            <div class="invalid-feedback">Please, enter the name!</div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tugas">Tugas</label>
                            <textarea class="form-control" id="tugas" name="tugas" rows="4" required>{{ old('tugas', $tim->tugas) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="">Pilih...</option>
                                <option value="Ketua" {{ $tim->status == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                                <option value="Anggota" {{ $tim->status == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('manage_tim.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

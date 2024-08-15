@extends('layout.admin')

@section('content-admin')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Pengumuman</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="post"
                        class="row g-3 needs-validation" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal Pengumuman</label>
                                <input type="date" class="form-control"
                                    value="{{ old('tanggal', $pengumuman->tanggal)->format('Y-m-d') }}" id="tanggal"
                                    name="tanggal" required>
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" value="{{ old('judul', $pengumuman->judul) }}"
                                    id="judul" name="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" required name="deskripsi" id="deskripsi" cols="30" rows="10">{{ old('deskripsi', $pengumuman->deskripsi) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="file">File</label>
                                <input type="file" class="form-control" id="file" name="file">
                                @if ($pengumuman->file)
                                    <p>File sebelumnya: <a href="{{ asset('storage/' . $pengumuman->file) }}"
                                            target="_blank">{{ $pengumuman->file }}</a></p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="">Pilih Status Pengumuman</option>
                                    <option value="draf"
                                        {{ old('status', $pengumuman->status) == 'draf' ? 'selected' : '' }}>Draf</option>
                                    <option value="publish"
                                        {{ old('status', $pengumuman->status) == 'publish' ? 'selected' : '' }}>Publish
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
<!-- Basic Inputs end -->

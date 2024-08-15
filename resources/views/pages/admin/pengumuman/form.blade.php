@extends('layout.admin')

@section('content-admin')
<div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Pengumuman</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="{{route('pengumuman.store')}}" method="post" class="row g-3 needs-validation" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Tanggal Pengumuman</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" required name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="text">File</label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                            <div class="form-group">
                                <label for="text">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="">Pilih Status Pengumuman</option>
                                    <option value="draf">Draf</option>
                                    <option value="publish">Publish</option>
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
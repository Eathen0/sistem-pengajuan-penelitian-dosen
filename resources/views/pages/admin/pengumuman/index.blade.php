@extends('layout.admin')

@section('content-admin')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pengumuman</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pengumuman</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Bordered table start -->
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead align="center">
                                    <tr>
                                        <th>TANGGAL PENGUMUMAN</th>
                                        <th>JUDUL</th>
                                        <th>DESKRIPSI</th>
                                        <th>FILE</th>
                                        <th>STATUS</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    @forelse ($pengumuman as $data)
                                        <tr>
                                            <td>{{ $data->tanggal->format('d-m-Y')}}</td>
                                            <td>{{ $data->judul }}</td>
                                            <td>{{ $data->deskripsi }}</td>
                                            <td>
                                                <a target="_blank" href="{{ Storage::url($data->file) }}">lihat file</a>
                                            </td>
                                            <td
                                                style="display: flex; justify-content: center; align-items: center; height: 100%; padding: 50% 0;">
                                                <span style="display: block; width: 100px"
                                                    class="{{ $data->status == 'draf' ? 'badge bg-info' : 'badge bg-success' }}">
                                                    {{ $data->status }}
                                                </span>
                                            </td>
                                            <td>
                                                <form id="delete-form-{{ $data->id }}"
                                                    onsubmit="event.preventDefault(); confirmDelete({{ $data->id }});"
                                                    action="{{ route('pengumuman.destroy', $data->id) }}" method="POST">
                                                    <a href="{{ route('pengumuman.edit', $data->id) }}"
                                                        class="btn icon icon-left btn-outline-warning"><i
                                                            data-feather="edit">Edit</i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn icon icon-left btn-outline-danger"><i
                                                            data-feather="delete">Hapus</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center alert alert-danger">Pengumuman masih
                                                kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bordered table end -->
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection

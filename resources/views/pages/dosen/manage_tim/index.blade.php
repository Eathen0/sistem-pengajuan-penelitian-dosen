@extends('layout.dosen-page')

@section('content-dosen')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Table</h3>
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
    <!-- Bordered table start -->
    <section class="section luaran">
        <div class="card">
            <div class="card-header">
                DATA TIM LITABMAS
            </div>
            <div class="card-body">
                <table class="table table-bordered mb-0" id="table1">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PROPOSAL</th>
                        <th>NAMA</th>
                        <th>TUGAS</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($datas as $index => $data)
                            <tr>
                                <td class="text-bold-500">{{ $index + 1 }}</td>
                                <td>{{ $data->judul }}</td>
                                <td class="text-bold-500">{{ $data->nama }}</td>
                                <td>{{ $data->tugas }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda yakin?')" action="{{route('manage_tim.destroy', $data->id)}}" method="POST">
                                        <a href="{{route('manage_tim.edit', $data->id)}}" class="btn icon icon-left btn-outline-warning"><i data-feather="edit">Edit</i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn icon icon-left btn-outline-danger"><i data-feather="delete">Hapus</i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center"> Data Tim Litabmas Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Bordered table end -->
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
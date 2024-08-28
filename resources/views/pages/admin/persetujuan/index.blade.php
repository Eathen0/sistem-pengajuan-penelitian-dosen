@extends('layout.admin')

@section('content-admin')
    <div class="pagetitle p-3">
        <h1>Daftar Proposal Submitted</h1>
    </div>

    <section class="section admin p-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered mb-0" >
            <thead>
                <tr>
                    <th class="no-column">No</th>
                    <th>Judul Proposal</th>
                    <th style="text-align: center">Persetujuan</th>
                    <th style="text-align: center">Tanggal Persetujuan</th>
                    <th class="aksi">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proposals as $index => $proposal)
                    <tr>
                        <td class="no-column">{{ $index + 1 }}</td>
                        <td>{{ $proposal->judul }}</td>
                        <td style="text-align: center">
                            <span
                                class="badge {{ $proposal->status_approvel == 'diterima' ? 'bg-success' : ($proposal->status_approvel == 'ditolak' ? 'bg-danger' : 'bg-secondary') }}">
                                {{ ucfirst($proposal->status_approvel) }}
                            </span>
                        </td>
                        <td style="text-align: center">
                            <small>{{ $proposal->approvel_date ? \Carbon\Carbon::parse($proposal->approvel_date)->format('d-m-Y') : 'Tanggal tidak tersedia' }}</small>
                        </td>
                        <td class="aksi">
                            <a href="{{ route('persetujuan.show', $proposal->id) }}" class="btn icon icon-left btn-outline-warning">
                                <i class="fa fa-question"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection

<style>
    .no-column {
        width: 100px;
        text-align: center;
    }

    .status {
        text-align: center;
    }

    .aksi {
        width: 100px;
        text-align: center;
    }
</style>

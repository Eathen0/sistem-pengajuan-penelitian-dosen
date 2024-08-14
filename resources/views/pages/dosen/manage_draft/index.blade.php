@extends('layout.dosen-page')

@section('content-dosen')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Proposal Drafts</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Proposal Drafts</li>
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
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA PROPOSAL</th>
                                    <th>TAHUN</th>
                                    <th>NAMA MITRA</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($proposals as $proposal)
                                    <tr>
                                        <td class="text-bold-500">{{ $loop->iteration }}</td>
                                        <td>{{ $proposal->judul }}</td>
                                        <td class="text-bold-500">{{ $proposal->created_at->year }}</td>
                                        <td>{{ $proposal->nama_mitra }}</td>
                                        <td>{{ $proposal->status }}</td>
                                        <td>
                                            <a href="{{ route('proposals.show', $proposal->id) }}" class="btn btn-sm btn-primary">View</a>
                                            <a href="{{ route('proposals.edit', $proposal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('proposals.destroy', $proposal->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this proposal?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No drafts found.</td>
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

@extends('layout.admin')

@section('content-admin')
    <div class="pagetitle p-3">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section admin p-3">
        <h1 class="text-3xl font-semibold">
            Selamat Datang
            <span class="fw-bold">
                @auth
                    {{ $userdata->nama ?? $userdata->username }}
                @else
                    Tamu
                @endauth
            </span>
        </h1>

        <div class="col-lg-8 w-100">
            <div class="row">
                <div class="col-xxl-12 col-md-12">
                    <div class="card info-card" style="background-color: #f8f9fa;">
                        <div class="card-body d-flex justify-content-stretch align-items-center p-0">
                            <div class="text-center bg-primary p-3 flex-grow-1 rounded">
                                <h5 class="card-title text-white">Jumlah Pengumuman</h5>
                                <h6 class="text-white">{{ $totalPengumuman }}</h6>
                            </div>
                            <div class="text-center bg-success p-3 flex-grow-1 rounded">
                                <h5 class="card-title text-white">Pengumuman Submitted</h5>
                                <h6 class="text-white">{{ $submittedPengumuman }}</h6>
                            </div>
                            <div class="text-center bg-warning p-3 flex-grow-1 rounded">
                                <h5 class="card-title text-white">Pengumuman Draft</h5>
                                <h6 class="text-white">{{ $draftPengumuman }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daftar Proposal -->
        <div class="mb-5 mt-3" style="display: flex; align-items: center; justify-content: space-between">
            <h3 class="w-75">Daftar Pengumuman</h3>
            @if ($pengumumans->count() > 0)
                <form id="search-pengumuman" style='width: 70%'>
                    <input type="text" name="q" id="search-input" value="{{ request()->get('q') }}"
                        placeholder="Cari nama pengumuman atau pemilik pengumuman" class="form-control">
                </form>
            @endif
        </div>

        <div class="col" id="data-pengumuman-container">
            @if ($pengumumans->count() > 0)
                @foreach ($pengumumans as $pengumuman)
                    <div class="w-100" id="data-pengumuman" data-pemilik="{{ $pengumuman->user->username }}"
                        data-namaPengumuman="{{ $pengumuman->judul }}">
                        <div class="card p-2 mb-3">
                            <div class="card-body">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <h5 style="line-clamp: 2" class="card-title text-truncate"
                                        title="{{ $pengumuman->judul }}">
                                        Data Pengumuman
                                        <strong>{{ $pengumuman->judul }}</strong>
                                    </h5>
                                    <span
                                        class="badge {{ $pengumuman->status === 'submitted' ? 'bg-success' : 'bg-warning' }} text-uppercase">{{ $pengumuman->status }}</span>
                                </div>
                                <p style="line-height: .3rem" class="mb-4 text-black-50">Pemilik
                                    <strong>{{ $pengumuman->user->username }}</strong></p>
                                <p style="line-height: .3rem" class="mb-4 text-black-50">NIDN
                                    <strong>{{ $pengumuman->user->nidn }}</strong></p>
                                <div style="display: flex; justify-content: space-between; align-items: flex-end">
                                    <a href="{{ route('pengumuman.show', $pengumuman->id) }}"
                                        class="btn btn-primary">Lihat</a>
                                    <p class="text-black-50 mb-0">
                                        Terakhir Diubah
                                        <span> | {{ $pengumuman->updated_at }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- pagination navigate -->
                <div style="display: flex; justify-content: center; align-items: center;">
                    <ul class="pagination">
                        <li class="page-item">
                            <a href="{{ $pengumumans->url(1) }}" class="page-link">First</a>
                        </li>
                        <li class="page-item">
                            @if ($pengumumans->previousPageUrl() == null)
                                <a href="#" class="page-link disabled">Previous</a>
                            @else
                                <a href="{{ $pengumumans->previousPageUrl() }}" class="page-link">Previous</a>
                            @endif
                        </li>
                        @php
                            $startPage = max($pengumumans->currentPage() - 2, 1);
                            $endPage = min($pengumumans->currentPage() + 2, $pengumumans->lastPage());
                        @endphp
                        @if ($startPage > 1)
                            <li class="page-item">
                                <a href="{{ $pengumumans->url(1) }}" class="page-link">1</a>
                            </li>
                            @if ($startPage > 2)
                                <li class="page-item">
                                    <span class="pagination-ellipsis">...</span>
                                </li>
                            @endif
                        @endif
                        @foreach (range($startPage, $endPage) as $page)
                            <li class="page-item">
                                <a href="{{ $pengumumans->url($page) }}" class="page-link">{{ $page }}</a>
                            </li>
                        @endforeach
                        @if ($endPage < $pengumumans->lastPage())
                            @if ($endPage < $pengumumans->lastPage() - 1)
                                <li class="page-item">
                                    <span class="pagination-ellipsis">...</span>
                                </li>
                            @endif
                            <li class="page-item">
                                <a href="{{ $pengumumans->url($pengumumans->lastPage()) }}"
                                    class="page-link">{{ $pengumumans->lastPage() }}</a>
                            </li>
                        @endif
                        <li class="page-item">
                            @if ($pengumumans->nextPageUrl() == null)
                                <a href="#" class="page-link disabled">Next</a>
                            @else
                                <a href="{{ $pengumumans->nextPageUrl() }}" class="page-link">Next</a>
                            @endif
                        </li>
                        <li class="page-item">
                            <a href="{{ $pengumumans->url($pengumumans->lastPage()) }}" class="page-link">Last</a>
                        </li>
                    </ul>
                </div>
            @else
                <h5 class="text-center">
                    Belum Ada Pengumuman Yang Diajukan
                </h5>
            @endif
        </div>
    </section>

    <script>
        window.onload = () => {
            let listDataPengumuman = [];
            document.querySelectorAll('#data-pengumuman').forEach(el => {
                listDataPengumuman.push({
                    pemilik: el.getAttribute('data-pemilik'),
                    namaPengumuman: el.getAttribute('data-namaPengumuman'),
                    element: el
                });
            });

            const searchInput = document.getElementById('search-input');
            document.getElementById('search-pengumuman').addEventListener('submit', ev => {
                ev.preventDefault();
                window.location.href = `/admin/pengumuman?q=${searchInput.value}`;
            });
        }
    </script>
@endsection

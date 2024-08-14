@extends('layout.dosen-page')

@section('content-dosen')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <h1 class="text-3xl font-semibold">
        Selamat Datang
        <span class="fw-bold">
            {{-- $userdata->nama --}}
        </span>
    </h1>

    <div class="col-lg-8 w-100">
        <div class="row">
            <div class="col-xxl-12 col-md-12">
                <div class="card info-card" style="background-color: #f8f9fa;">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="text-center">
                            <h5 class="card-title">Jumlah Proposal</h5>
                            <h6>{{ $totalProposals }}</h6>
                        </div>
                        <div class="text-center">
                            <h5 class="card-title">Proposal Submitted</h5>
                            <h6>{{ $submittedProposals }}</h6>
                        </div>
                        <div class="text-center">
                            <h5 class="card-title">Proposal Draft</h5>
                            <h6>{{ $draftProposals }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Daftar Proposal -->
    <div class="mb-5 mt-3" style="display: flex; align-items: center; justify-content: space-between">
        <h3 class="w-75">Daftar Proposal</h3>
        @if (!isset($proposals['searchNotFound']))
            @if ($proposals->count() > 0)
                <form id="search-proposal" style='width: 70%'>
                    <input type="text" name="search" id="search-input" value="{{ request()->query->has('search') ? request()->query->get('search') : '' }}" placeholder="Cari nama proposal atau pemilik proposal" class="form-control">
                </form>
            @endif
        @else
            <form id="search-proposal" style='width: 70%'>
                <input type="text" name="search" id="search-input" value="{{ request()->query->has('search') ? request()->query->get('search') : '' }}" placeholder="Cari nama proposal atau pemilik proposal" class="form-control">
            </form>
        @endif
    </div>
    
    <div class="col" id="data-proposal-container">
        @if (!isset($proposals['searchNotFound']))
            @if ($proposals->count() > 0)
                @foreach ($proposals as $index => $proposal)
                    <div class="w-100" id="data-proposal" data-pemilik="{{ $proposal->username }}" data-namaProposal="{{ $proposal->judul }}">
                        <div class="card p-2">
                            <div class="card-body">
                                <h5 style="line-height: .3rem" class="card-title">
                                    Data Proposal
                                    <strong>
                                        {{ $proposal->judul }}
                                    </strong>
                                </h5>
                                <p style="line-height: .3rem" class="mb-4 text-black-50">Pemilik <strong>{{ $proposal->username }}</strong></p>
                                <p style="line-height: .3rem" class="mb-4 text-black-50">NIDN <strong>{{ $proposal->user_nidn }}</strong></p>
                                <div style="display: flex; justify-content: space-between; align-items: flex-end">
                                    <a href="{{ route('proposal.show', $proposal->id) }}" class="btn btn-primary">Lihat</a>
                                    <p class="text-black-50 mb-0">
                                        Terakhir Diubah
                                        <span> | {{ $proposal->updated_at }}</span>
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
                            <a href="{{ $proposals->url(1) }}" class="page-link">First</a>
                        </li>
                        <li class="page-item">
                            @if ($proposals->previousPageUrl() == null)
                                <a href="#" class="page-link disabled">Previous</a>
                            @else
                                <a href="{{ $proposals->previousPageUrl() }}" class="page-link">Previous</a>
                            @endif
                        </li>
                        @php
                            $startPage = max($proposals->currentPage() - 2, 1);
                            $endPage = min($proposals->currentPage() + 2, $proposals->lastPage());
                        @endphp
                        @if ($startPage > 1)
                            <li class="page-item">
                                <a href="{{ $proposals->url(1) }}" class="page-link">1</a>
                            </li>
                            @if ($startPage > 2)
                                <li class="page-item">
                                    <span class="pagination-ellipsis">...</span>
                                </li>
                            @endif
                        @endif
                        @foreach(range($startPage, $endPage) as $page)
                            <li class="page-item">
                                <a href="{{ $proposals->url($page) }}" class="page-link">{{ $page }}</a>
                            </li>
                        @endforeach
                        @if ($endPage < $proposals->lastPage())
                            @if ($endPage < $proposals->lastPage() - 1)
                                <li class="page-item">
                                    <span class="pagination-ellipsis">...</span>
                                </li>
                            @endif
                            <li class="page-item">
                                <a href="{{ $proposals->url($proposals->lastPage()) }}" class="page-link">{{ $proposals->lastPage() }}</a>
                            </li>
                        @endif
                        <li class="page-item">
                            @if ($proposals->nextPageUrl() == null)
                                <a href="#" class="page-link disabled">Next</a>
                            @else
                                <a href="{{ $proposals->nextPageUrl() }}" class="page-link">Next</a>
                            @endif
                        </li>
                        <li class="page-item">
                            @if ($proposals->url($proposals->lastPage()) == null)
                                <a href="#" class="page-link disabled">Last</a>
                            @else
                                <a href="{{ $proposals->url($proposals->lastPage()) }}" class="page-link">Last</a>
                            @endif
                        </li>
                    </ul>
                </div>
            @else
                <h5 class="text-center">
                    Belum Ada Proposal Yang Diajukan
                </h5>
            @endif
        @else
            <h5 class="text-center">
                Data Proposal Tidak Ditemukan
            </h5>
        @endif
    </div>
</section>

<script>
    window.onload = () => {
        document.querySelectorAll('#data-proposal').forEach(el => {
            listDataProposal.push({
                pemilik: el.getAttribute('data-pemilik'),
                namaProposal: el.getAttribute('data-namaProposal'),
                element: el 
            })
        })
        
        const serachInput = document.getElementById('search-input');
        document.getElementById('search-proposal').addEventListener('submit', ev => {
            ev.preventDefault()
            window.location.href = `/dosen/proposal?q=${serachInput.value}`
        })
    }
</script>
@endsection

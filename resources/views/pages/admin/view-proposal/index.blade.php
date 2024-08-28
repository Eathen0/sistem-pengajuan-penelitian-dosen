@extends('layouts.admin')

@section('content-admin')
<div class="pagetitle">
   <h1>Detail Proposal</h1>
   <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Detail Proposal</li>
         </ol>
   </nav>
</div>

<div class="card">
   @if ($proposal)
      <div class="card-header" style="display: flex; align-items: center">
         <h3>Informasi Proposal <strong>{{ $proposal->judul }}</strong></h3>
         <a class="btn btn-primary" style="margin-left: auto; margin-right: 1rem;" href="{{ route('dashboard') }}">Kembali</a>
         <button type="submit" class="btn btn-danger" onclick="confirmDelete()">Hapus</button>
      </div>
      <form method="post" action="{{ route('proposal.destroy', $proposal->id) }}" id="request_delete">
         @csrf
         @method('delete')
      </form>
      <div class="card-body">
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong>NIDN</strong></div>
            <div class="col-sm-8">: {{ $proposal->user_nidn }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>ID Skema</strong></div>
            <div class="col-sm-8">: {{ $proposal->id_skema }}</div>
         </div>
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong>Judul</strong></div>
            <div class="col-sm-8">: {{ $proposal->judul }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Nama Mitra</strong></div>
            <div class="col-sm-8">: {{ $proposal->nama_mitra }}</div>
         </div>
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong>Alamat Mitra</strong></div>
            <div class="col-sm-8">: {{ $proposal->alamat_mitra }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Kata Kunci</strong></div>
            <div class="col-sm-8">: {{ $proposal->kata_kunci }}</div>
         </div>
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong>Latar Belakang</strong></div>
            <div class="col-sm-8">: {{ $proposal->latar_belakang }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Ringkasan</strong></div>
            <div class="col-sm-8">: {{ $proposal->ringkasan }} </div>
         </div>
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong> Urgensi</strong></div>
            <div class="col-sm-8">: {{ $proposal->urgensi }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Rumusan Masalah </strong></div>
            <div class="col-sm-8">: {{ $proposal->rumusan_masalah }}</div>
         </div>
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong>Pendekatan Pemecahan Masalah</strong></div>
            <div class="col-sm-8">: {{ $proposal->pendekatan_pemecahan_masalah }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Kebaruan</strong></div>
            <div class="col-sm-8">: {{ $proposal->kebaruan }}</div>
         </div>
         <div class="row p-2" style="background-color: rgba(0, 0, 0, 0.05)">
            <div class="col-sm-4"><strong>Metode Penelitian</strong></div>
            <div class="col-sm-8">: {{ $proposal->metode_penelitian }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Jadwal Penelitian</strong></div>
            <div class="col-sm-8">: {{ $proposal->jadwal_penelitian }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Daftar Pustaka</strong></div>
            <div class="col-sm-8">: {{ $proposal->daftar_pustaka }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Status</strong></div>
            <div class="col-sm-8">: {{ $proposal->status }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Nilai</strong></div>
            <div class="col-sm-8">: {{ $proposal->nilai }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Tanggal Submit</strong></div>
            <div class="col-sm-8">: {{ $proposal->tanggal_submit }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Laporan Progress </strong></div>
            <div class="col-sm-8">: {{ $proposal->laporan_progress }}</div>
         </div>
         <div class="row p-2">
            <div class="col-sm-4"><strong>Laporan Akhir </strong></div>
            <div class="col-sm-8">: {{ $proposal->laporan_akhir }}</div>
         </div>
      </div>
      <script>
         function confirmDelete() {
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
                  document.getElementById('request_delete').submit();
               }
            });
         };
      </script>
   @else
      @if (Session('success'))
         <div class="alert alert-success">{{ Session('success') }}</div>
      @else
         <h5 class="text-center p-4">Proposal Tidak Ditemukan</h5>
      @endif
   @endif
</div>
@endsection
 
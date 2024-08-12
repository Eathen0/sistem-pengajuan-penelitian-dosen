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
                        <li class="breadcrumb-item active" aria-current="page">Capaian/Luaran</li>
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
                                <th>JENIS CAPAIAN</th>
                                <th>INDIKATOR</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-bold-500">1</td>
                                <td>UI/UX</td>
                                <td class="text-bold-500">2024</td>
                                <td>NASKAH JURNAL</td>
                                <td>safuenfltoownoi ytetnuoiu ytuoiyuven utnvoiuniouotp uifuib3yctibyo8i</td>
                                <td>
                                    <a href="#">
                                        <i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="mail"></i>
                                    </a>
                                </td>
                            </tr>
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
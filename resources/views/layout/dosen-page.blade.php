@extends('layout.root')

@section('content')
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="/assets/themes/voler-main/assets/images/logo.svg" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Main Menu</li>    
                        <li class="sidebar-item  ">
                            <a href="" class='sidebar-link'>
                                <i data-feather="home" width="20"></i> 
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class='sidebar-title'>Forms &amp; Tables</li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="file-text" width="20"></i> 
                                <span>Proposal</span>
                            </a>
                            <ul class="submenu ">  
                                <li>
                                    <a href="{{ route('manage_proposal.index') }}">Tabel</a>
                                </li>
                                <li>
                                    <a href="form-element-input-group.html">Tambah</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="users" width="20"></i> 
                                <span>Tim</span>
                            </a>
                            <ul class="submenu ">  
                                <li>
                                    <a href="{{ route('manage_tim.index') }}">Tabel</a>
                                </li>
                                <li>
                                    <a href="{{ route('manage_tim.create') }}">Tambah</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="award" width="20"></i> 
                                <span>Luaran/Capaian</span>
                            </a>
                            <ul class="submenu ">  
                                <li>
                                    <a href="{{ route('manage_luaran.index') }}">Tabel</a>
                                </li>
                                <li>
                                    <a href="form-element-input-group.html">Tambah</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="file-text" width="20"></i> 
                                <span>Draft</span>
                            </a>
                            <ul class="submenu ">  
                                <li>
                                    <a href="{{ route('managedraft') }}">Tabel</a>
                                </li>
                                <li>
                                    <a href="form-element-input-group.html">Tambah</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        {{-- account --}}
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="/assets/themes/voler-main/assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, Saugi</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            @yield('content-dosen')
        </div>
    </div>
@endsection
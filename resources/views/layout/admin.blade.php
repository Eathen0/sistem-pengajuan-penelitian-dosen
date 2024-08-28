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
                        <li class="sidebar-item ">
                            <a href="{{ route('dashboard') }}"
                                class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class='sidebar-title'>Forms &amp; Tables</li>
                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="file-text" width="20"></i>
                                <span>Persetujuan Proposal
                                </span>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="{{ route('admin.persetujuan') }}">Tabel</a>

                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item has-sub {{ request()->routeIs('pengumuman.*') ? 'active' : '' }}">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="bell" width="20"></i>
                                <span>Pengumuman
                                </span>
                            </a>
                            <ul class="submenu {{ request()->routeIs('pengumuman.*') ? 'active' : '' }}">
                                <li>
                                    <a href="{{ route('pengumuman') }}">Tabel</a>
                                </li>
                                <li>
                                    <a href="{{ route('pengumuman.create') }}">Tambah</a>
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
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        {{-- account --}}
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="/assets/themes/voler-main/assets/images/avatar/avatar-s-1.png" alt=""
                                        srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">My Profile</div>
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
            @yield('content-admin')
        </div>
    </div>
@endsection

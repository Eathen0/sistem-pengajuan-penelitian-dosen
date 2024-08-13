<?php

namespace App\Http\Controllers;

use App\Models\capaian;
use Illuminate\Http\Request;

class CapaianController extends Controller
{
    public function index () 
    {
        $menu = 'manage_luaran';
        $submenu = 'capaian';
        $datas = capaian::join('proposals', 'capaians.id_proposal', '=' , 'proposals.id')
        ->get(['proposals.judul', 'capaians.tahun','capaians.jenis_capaian','capaians.indikator', 'capaians.id']);
        return view('pages.dosen.manage_luaran.index',compact('menu','submenu','datas'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapaianController extends Controller
{
    public function index () {
        return view('pages.dosen.manage_luaran.index');
    }
}

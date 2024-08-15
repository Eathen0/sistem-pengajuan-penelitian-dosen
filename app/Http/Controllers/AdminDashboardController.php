<?php

namespace App\Http\Controllers;

use App\Models\pengumuman;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Ambil data user
        $userdata = auth()->user();
    
        // Menghitung jumlah pengumuman
        $totalPengumuman = Pengumuman::count();
    
        // Menghitung jumlah pengumuman yang submitted
        $submittedPengumuman = Pengumuman::where('status', 'submitted')->count();
    
        // Menghitung jumlah pengumuman yang draft
        $draftPengumuman = Pengumuman::where('status', 'draft')->count(); // Perbaikan disini
    
        // Mengambil data pengumuman untuk ditampilkan di tabel
        $query = Pengumuman::query();
    
        // Jika ada pencarian
        if (request()->has('q')) {
            $search = request()->get('q');
            $query->where('judul', 'LIKE', "%$search%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('username', 'LIKE', "%$search%");
                  });
        }
    
        $pengumumans = $query->paginate(10);
    
        // Mengirim data ke view
        return view('pages.admin.dashboard', compact('userdata', 'totalPengumuman', 'submittedPengumuman', 'draftPengumuman', 'pengumumans'));
    }
   }
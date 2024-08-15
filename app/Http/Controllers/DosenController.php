<?php

namespace App\Http\Controllers;

use App\Models\proposal;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function dashboard()
    {
        // Ambil data user
        $userdata = auth()->user();
    
        // Menghitung jumlah proposal
        $totalProposals = Proposal::count();
    
        // Menghitung jumlah proposal yang submitted
        $submittedProposals = Proposal::where('status', 'submitted')->count();
    
        // Menghitung jumlah proposal yang draft
        $draftProposals = Proposal::where('status', 'draf')->count();
    
        // Mengambil data proposal untuk ditampilkan di tabel
        $query = Proposal::query();
    
        // Jika ada pencarian
        if (request()->has('q')) {
            $search = request()->get('q');
            $query->where('judul', 'LIKE', "%$search%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('username', 'LIKE', "%$search%");
                  });
        }
    
        $proposals = $query->paginate(10);
    
        // Mengirim data ke view
        return view('pages.dosen.dashboard', compact('userdata', 'totalProposals', 'submittedProposals', 'draftProposals', 'proposals'));
    }
}

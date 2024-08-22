<?php
namespace App\Http\Controllers;
use App\Models\proposal;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    public function index(){
    $proposals = proposal::all();
    return view('pages.admin.persetujuan.index', compact('proposals'));
    }

    
    public function showProposals(){
        
    $proposals = Proposal::all(); // Mengambil semua proposal    
    $proposals = proposal::where('status', proposal::STATUS_SUBMITTED)->get();
    return view('pages.admin.persetujuan.index', compact('proposals'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Validasi hanya untuk field status
        $validatedData = $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);

        // Temukan proposal berdasarkan ID
        $proposal = Proposal::findOrFail($id);

        // Perbarui status dan tanggal persetujuan
        $proposal->status_approvel = $request->input('status');
        $proposal->approvel_date = now(); // Gunakan field ini untuk menyimpan tanggal persetujuan

        // Simpan perubahan
        $proposal->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.persetujuan')->with('success', 'Status proposal berhasil diperbarui.');
    }


    function show($id){
        $menu = 'data';
        $submenu = 'proposal';
        $proposal = proposal::find($id);
        return view('pages.admin.persetujuan.view', compact('proposal', 'menu', 'submenu'));
    }

     // Menyimpan data proposal baru
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'user_nidn' => 'required',
            'id_skema' => 'required',
            'judul' => 'required|string|max:255',
            'nama_mitra' => 'required|string|max:255',
            'alamat_mitra' => 'required|string',
            'kata_kunci' => 'required|string|max:255',
            'latar_belakang' => 'required|string',
            'ringkasan' => 'required|string',
            'urgensi' => 'required|string',
            'rumusan_masalah' => 'required|string',
            'pendekatan_pemecahan_masalah' => 'required|string',
            'kebaruan' => 'required|string',
            'metode_penelitian' => 'required|string',
            'jadwal_penelitian' => 'required|string',
            'daftar_pustaka' => 'required|string',
            'laporan_progres' => 'required|string',
            'laporan_akhir' => 'required|string',
            'status_aprovel' => 'required|in:diterima,ditolak',
            
        ]);

        // Simpan proposal ke database
        $proposal = new Proposal();
        $proposal->user_nidn = $request->input('user_nidn');
        $proposal->id_skema = $request->input('id_skema');
        $proposal->judul = $request->input('judul');
        $proposal->nama_mitra = $request->input('nama_mitra');
        $proposal->alamat_mitra = $request->input('alamat_mitra');
        $proposal->kata_kunci = $request->input('kata_kunci');
        $proposal->latar_belakang = $request->input('latar_belakang');
        $proposal->ringkasan = $request->input('ringkasan');
        $proposal->urgensi = $request->input('urgensi');
        $proposal->rumusan_masalah = $request->input('rumusan_masalah');
        $proposal->pendekatan_pemecahan_masalah = $request->input('pendekatan_pemecahan_masalah');
        $proposal->kebaruan = $request->input('kebaruan');
        $proposal->metode_penelitian = $request->input('metode_penelitian');
        $proposal->jadwal_penelitian = $request->input('jadwal_penelitian');
        $proposal->daftar_pustaka = $request->input('daftar_pustaka');
        $proposal->status = 'draft';
        $proposal->laporan_progres = $request->input('laporan_progres');
        $proposal->laporan_akhir = $request->input('laporan_akhir');
        $proposal->save();

        return redirect()->route('proposal.index')->with('success', 'Proposal berhasil disimpan.');
    }
}
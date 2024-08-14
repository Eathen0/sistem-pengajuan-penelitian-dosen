<?php 

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ManageDraftController extends Controller
{
    /**
     * Display a listing of the proposals with status 'draft'.
     */
    public function index()
    {
        // Mendapatkan semua proposal dengan status 'draf'
        $proposals = Proposal::where('status', 'draf')->get();

        // Mengirim data proposal ke view
        return view('pages.dosen.manage_draft.index', compact('proposals'));
    }

    /**
     * Show the form for editing the specified proposal.
     */
    public function edit($id)
    {
        // Mencari proposal berdasarkan ID
        $proposal = Proposal::findOrFail($id);

        // Mengirim data proposal ke view untuk diedit
        return view('pages.dosen.manage_draft.edit', compact('proposal'));
    }

    /**
     * Update the specified proposal in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input yang diterima
        $request->validate([
            'user_nidn' => 'required|string|max:10',
            'id_skema' => 'required|integer',
            'judul' => 'required|string',
            'nama_mitra' => 'required|string',
            'alamat_mitra' => 'required|string',
            'kata_kunci' => 'required|string',
            'latar_belakang' => 'required|string',
            'ringkasan' => 'required|string',
            'urgensi' => 'required|string',
            'rumusan_masalah' => 'required|string',
            'pendekatan_pemecahan_masalah' => 'required|string',
            'kebaruan' => 'required|string',
            'metode_penelitian' => 'required|string',
            'jadwal_penelitian' => 'required|string',
            'daftar_pustaka' => 'required|string',
            'status' => 'required|in:draf,submitted',
            'status_approvel' => 'required|in:diterima,ditolak',
            'nilai' => 'nullable|integer',
            'tanggal_submit' => 'nullable|date',
            'approvel_date' => 'nullable|date',
            'laporan_progress' => 'nullable|string',
            'laporan_akhir' => 'nullable|string',
        ]);

        // Mencari proposal berdasarkan ID
        $proposal = Proposal::findOrFail($id);

        // Mengupdate data proposal dengan input yang baru
        $proposal->update($request->all());

        // Mengarahkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('managedraft')->with('success', 'Proposal updated successfully');
    }

    /**
     * Remove the specified proposal from storage.
     */
    public function destroy($id)
    {
        // Mencari proposal berdasarkan ID
        $proposal = Proposal::findOrFail($id);

        // Menghapus proposal
        $proposal->delete();

        // Mengarahkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('managedraft')->with('success', 'Proposal deleted successfully');
    }
}
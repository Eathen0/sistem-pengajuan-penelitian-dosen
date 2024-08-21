<?php

namespace App\Http\Controllers;

use App\Models\capaian;
use App\Models\proposal;
use App\Models\skema_penelitian;
use App\Models\tim_litabmas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProposalController extends Controller
{
    public function index()
    {
        $menu = 'manage_proposal';
        $submenu = 'proposal';
        return view('pages.dosen.manage_proposal.index', compact('menu', 'submenu'));
    }

    // Method untuk menampilkan form
    public function create()
    {
        $users = User::all(); // Mengambil semua user
        $skemas = skema_penelitian::all(); // Mengambil semua skema

        return view('pages.dosen.manage_proposal.form', compact('users', 'skemas'));
    }

    // Method untuk menyimpan data proposal
    public function store(Request $request)
    {
        // return $request->all();
        // \Log::info('Data Proposal:', $request->all());
        try {
            // Validasi data
            // $request->validate([
            //     'user_nidn' => 'required',
            //     'id_skema' => 'required',
            //     'judul' => 'required|string|max:255',
            //     'nama_mitra' => 'required|string|max:255',
            //     'alamat_mitra' => 'required|string',
            //     'kata_kunci' => 'required|string|max:255',
            //     'latar_belakang' => 'required|string',
            //     'ringkasan' => 'required|string',
            //     'urgensi' => 'required|string',
            //     'rumusan_masalah' => 'required|string',
            //     'pendekatan_pemecahan_masalah' => 'required|string',
            //     'kebaruan' => 'required|string',
            //     'metode_penelitian' => 'required|string',
            //     'jadwal_penelitian' => 'required|string',
            //     'daftar_pustaka' => 'required|string',
            //     'laporan_progres' => 'required|file|mimes:pdf,doc,docx|max:2048',
            //     'laporan_akhir' => 'required|file|mimes:pdf,doc,docx|max:2048',
            //     'tim_litabmas.*.nama' => 'required_with_all:tim_litabmas.*.tugas,tim_litabmas.*.status',
            //     'tim_litabmas.*.tugas' => 'required_with_all:tim_litabmas.*.nama,tim_litabmas.*.status',
            //     'tim_litabmas.*.status' => 'required_with_all:tim_litabmas.*.nama,tim_litabmas.*.tugas',
            //     'capaian.*.tahun' => 'required_with_all:capaian.*.jenis_capaian,capaian.*.indikator',
            //     'capaian.*.jenis_capaian' => 'required_with_all:capaian.*.tahun,capaian.*.indikator',
            //     'capaian.*.indikator' => 'required_with_all:capaian.*.tahun,capaian.*.jenis_capaian',
            // ]);            

            // Simpan proposal
            $proposal = new Proposal();
            $proposal->user_nidn = $request->user_nidn;
            $proposal->id_skema = $request->id_skema;
            $proposal->judul = $request->judul;
            $proposal->nama_mitra = $request->nama_mitra;
            $proposal->alamat_mitra = $request->alamat_mitra;
            $proposal->kata_kunci = $request->kata_kunci;
            $proposal->latar_belakang = $request->latar_belakang;
            $proposal->ringkasan = $request->ringkasan;
            $proposal->urgensi = $request->urgensi;
            $proposal->rumusan_masalah = $request->rumusan_masalah;
            $proposal->pendekatan_pemecahan_masalah = $request->pendekatan_pemecahan_masalah;
            $proposal->kebaruan = $request->kebaruan;
            $proposal->metode_penelitian = $request->metode_penelitian;
            $proposal->jadwal_penelitian = $request->jadwal_penelitian;
            $proposal->daftar_pustaka = $request->daftar_pustaka;
            $proposal->status = 'draf';

            // Ensure these fields are empty
            $proposal->status_approvel = null;
            $proposal->nilai = null;
            $proposal->tanggal_submit = null;
            $proposal->approvel_date = null;

            // Simpan file laporan progres
            if ($request->hasFile('laporan_progres')) {
                // Log the file information for debugging
                // \Log::info('Laporan Progres File:', ['file' => $request->file('laporan_progres')]);
                
                $file = $request->file('laporan_progres');
                $path = $file->store('proposal/progres', 'public');
                $proposal->laporan_progress = $path;
            }

            // Simpan file laporan akhir
            if ($request->hasFile('laporan_akhir')) {
                // Log the file information for debugging
                // \Log::info('Laporan Akhir File:', ['file' => $request->file('laporan_akhir')]);

                $file = $request->file('laporan_akhir');
                $path = $file->store('proposal/akhir', 'public');
                $proposal->laporan_akhir = $path;
            }


            // return ["proposal" => $proposal];

            $proposal->save();

            // Simpan data tim
            if ($request->has('tim_litabmas')) {
                foreach ($request->tim_litabmas as $timData) {
                    $tim = new tim_litabmas();
                    $tim->id_proposal = $proposal->id;
                    $tim->nama = $timData['nama'];
                    $tim->tugas = $timData['tugas'];
                    $tim->status_tim = $timData['status_tim'];
                    $tim->save();
                }
            }

            // Simpan data capaian
            if ($request->has('capaian')) {
                foreach ($request->capaian as $capaianData) {
                    $capaian = new Capaian();
                    $capaian->id_proposal = $proposal->id;
                    $capaian->tahun = $capaianData['tahun'];
                    $capaian->jenis_capaian = $capaianData['jenis_capaian'];
                    $capaian->indikator = $capaianData['indikator'];
                    $capaian->save();
                }
            }

            return redirect()->route('manage_proposal.index')->with('success', 'Proposal berhasil disimpan.');
        } catch (\Exception $e) {
            // Log error and return a friendly message
            // \Log::error('Error storing proposal: '.$e->getMessage());
            return ["error" => $e];
            return back()->withErrors(['msg' => 'Terjadi kesalahan saat menyimpan proposal.']);
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\capaian;
use App\Models\proposal;
use App\Models\skema_penelitian;
use App\Models\tim_litabmas;
use App\Models\User;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index () {
        $menu = 'manage_proposal';
        $submenu = 'proposal';
        // $datas = proposal::join('user', 'gurus.golongan_id', '=' , 'golongans.id', 'left')
        // ->join('users', 'gurus.user_id', '=', 'users.id')
        // ->get(['users.username AS NIP', 'golongans.golongan','golongans.pangkat','gurus.name_guru','users.email', 'gurus.id']);
        return view('pages.dosen.manage_proposal.index');
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
        // Validasi data
        $request->validate([
            'user_nidn' => 'required',
            'id_skema' => 'required',
            'judul' => 'required|string|max:255',
            'nama_mitra' => 'nullable|string|max:255',
            'alamat_mitra' => 'nullable|string',
            'kata_kunci' => 'nullable|string|max:255',
            'latar_belakang' => 'nullable|string',
            'ringkasan' => 'nullable|string',
            'urgensi' => 'nullable|string',
            'rumusan_masalah' => 'nullable|string',
            'pendekatan_pemecahan_masalah' => 'nullable|string',
            'kebaruan' => 'nullable|string',
            'metode_penelitian' => 'nullable|string',
            'jadwal_penelitian' => 'nullable|string',
            'daftar_pustaka' => 'nullable|string',
            'laporan_progres' => 'nullable|string',
            'laporan_akhir' => 'nullable|string',
            'tim.*.nama_anggota' => 'required_with:tim.*.tugas,tim.*.status',
            'tim.*.tugas' => 'required_with:tim.*.nama_anggota,tim.*.status',
            'tim.*.status' => 'required_with:tim.*.nama_anggota,tim.*.tugas',
            'capaian.*.tahun' => 'required_with:capaian.*.jenis_capaian,capaian.*.indikator',
            'capaian.*.jenis_capaian' => 'required_with:capaian.*.tahun,capaian.*.indikator',
            'capaian.*.indikator' => 'required_with:capaian.*.tahun,capaian.*.jenis_capaian',
        ]);

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
        $proposal->status = 'draft';
        $proposal->laporan_progres = $request->laporan_progres;
        $proposal->laporan_akhir = $request->laporan_akhir;
        $proposal->save();

        // Simpan data tim
        if ($request->has('tim_litabmas')) {
            foreach ($request->tim_litabmas as $timData) {
                $tim = new tim_litabmas();
                $tim->id_proposal = $proposal->id;
                $tim->nama = $timData['nama'];
                $tim->tugas = $timData['tugas'];
                $tim->status = $timData['status'];
                $tim->save();
            }
        }

        // Simpan data capaian
        if ($request->has('capaian')) {
            foreach ($request->capaian as $capaianData) {
                $capaian = new capaian();
                $capaian->id_proposal = $proposal->id;
                $capaian->tahun = $capaianData['tahun'];
                $capaian->jenis_capaian = $capaianData['jenis_capaian'];
                $capaian->indikator = $capaianData['indikator'];
                $capaian->save();
            }
        }

        return redirect()->route('manage_proposal.index')->with('success', 'Proposal berhasil disimpan.');
    }

}
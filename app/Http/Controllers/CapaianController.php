<?php

namespace App\Http\Controllers;

use App\Models\capaian;
use App\Models\proposal;
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

    public function create()
    {
        $menu = 'data';
        $submenu = 'capaian';
        $proposal = proposal::all();
        return view('pages.dosen.manage_luaran.form', compact('menu','submenu','proposal'));
    }

    // Store a newly created Capaian in storage
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'id_proposal' => 'required|exists:proposals,id', // Ensures the proposal ID exists in the proposals table
            'tahun' => 'required|digits:4|integer|min:1000|max:9999' . date('Y'), // Validates the year as a 4-digit number
            'jenis_capaian' => 'required|in:HKI,Naskah Jurnal,Buku Ajar', // Ensures the jenis_capaian is one of the specified options
            'indikator' => 'required|string', // Ensures the indikator field is a string and is filled in
        ]);

        // Create and save the new Capaian
        $capaian = new Capaian();
        $capaian->id_proposal = $validatedData['id_proposal'];
        $capaian->tahun = $validatedData['tahun'];
        $capaian->jenis_capaian = $validatedData['jenis_capaian'];
        $capaian->indikator = $validatedData['indikator'];
        $capaian->save();

        // Redirect back to the index page with a success message
        return redirect()->route('manage_luaran.index')->with('success', 'Capaian berhasil ditambahkan!');
    }

    // Show the form for editing the specified Capaian
    public function edit($id)
    {
        $menu = 'data';
        $submenu = 'capaian';
        $capaian = Capaian::findOrFail($id); // Fetch the specific Capaian by ID or fail
        $proposal = Proposal::all(); // Fetch all proposals to populate the dropdown
        return view('pages.dosen.manage_luaran.form_edit', compact('menu','submenu','capaian', 'proposal'));
    }

    // Update the specified Capaian in storage
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'id_proposal' => 'required|exists:proposals,id',
            'tahun' => 'required|digits:4|integer|min:1000|max:9999' . date('Y'),
            'jenis_capaian' => 'required|in:HKI,Naskah Jurnal,Buku Ajar',
            'indikator' => 'required|string',
        ]);

        // Find the Capaian by ID and update its data
        $capaian = Capaian::findOrFail($id);
        $capaian->id_proposal = $validatedData['id_proposal'];
        $capaian->tahun = $validatedData['tahun'];
        $capaian->jenis_capaian = $validatedData['jenis_capaian'];
        $capaian->indikator = $validatedData['indikator'];
        $capaian->save();

        // Redirect back to the index page with a success message
        return redirect()->route('manage_luaran.index')->with('success', 'Capaian berhasil diperbarui!');
    }

    // Remove the specified Capaian from storage
    public function destroy($id)
    {
        
        $capaian = capaian::findOrFail($id); // Find the Capaian by ID or fail
        $capaian->delete(); // Delete the Capaian
        // Redirect back to the index page with a success message
        return redirect()->route('manage_luaran.index')->with('success', 'Capaian berhasil dihapus!');
    }
}

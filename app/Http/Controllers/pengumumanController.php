<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::where('status', 'publish')->get();
        return view('welcome', compact('pengumuman'));
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id); // Use findOrFail to handle non-existent records
        return view('showPengumuman', compact('pengumuman'));
    }


    public function create()
    {
        return view('pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file' => 'nullable|string',
            'status' => 'required|in:draf,publish',
        ]);

        Pengumuman::create($request->all());

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman created successfully.');
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_user' => 'required',
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file' => 'nullable|string',
            'status' => 'required|in:draf,publish',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update($request->all());

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman updated successfully.');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman deleted successfully.');
    }
}

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
    public function admin(){
         $pengumuman = Pengumuman::latest()->paginate(5);
         return view('pages.admin.pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        $menu = 'data';
        $submenu = 'pengumuman';
        return view('pages.admin.pengumuman.form', compact('menu','submenu'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'file' => 'nullable',
            'status' => 'required|in:draf,publish',
        ]);

        $data['id_user'] = '102021';

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('pengumuman_files', 'public');
        }

        Pengumuman::create($data);

        return redirect()->route('pengumuman.admin')->with('success', 'Pengumuman created successfully.');
    }

    public function edit($id)
    {
        $menu = 'pengumuman';
        $submenu = 'pengumuman';
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pages.admin.pengumuman.form_edit', compact('pengumuman', 'menu', 'submenu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'file' => 'nullable|string',
            'status' => 'required|in:draf,publish',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update($request->all());

        return redirect()->route('pengumuman')->with('success', 'Pengumuman updated successfully.');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('pengumuman')->with('success', 'Pengumuman deleted successfully.');
    }
}
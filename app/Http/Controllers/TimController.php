<?php

namespace App\Http\Controllers;

use App\Models\proposal;
use App\Models\tim_litabmas;
use Illuminate\Http\Request;

class TimController extends Controller
{

    public function index () 
    {
        $menu = 'manage_tim';
        $submenu = 'tim_litabmas';
        $datas = tim_litabmas::join('proposals', 'tim_litabmas.id_proposal', '=' , 'proposals.id')
        ->get(['proposals.judul', 'tim_litabmas.nama','tim_litabmas.tugas','tim_litabmas.status_tim', 'tim_litabmas.id']);
        return view('pages.dosen.manage_tim.index',compact('menu','submenu','datas'));
    }

    public function create()
    {
        $menu = 'data';
        $submenu = 'tim_litabmas';
        $proposal = proposal::all();
        return view('pages.dosen.manage_tim.form', compact('menu','submenu','proposal'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'id_proposal' => 'required|exists:proposals,id',
            'nama' => 'required|string|max:255',
            'tugas' => 'required|string|max:255',
            'status_tim' => 'required|string|max:50',
        ]);


        try {
            // Create a new instance of tim_litabmas and assign the request data
            $timLitabmas = new tim_litabmas();
            $timLitabmas->id_proposal = $request->id_proposal;
            $timLitabmas->nama = $request->nama;
            $timLitabmas->tugas = $request->tugas;
            $timLitabmas->status_tim = $request->status_tim;

            // Save the data to the database
            $timLitabmas->save();

            // Redirect back with a success message
            return redirect()->route('manage_tim.index')
                ->with('success', 'Tim Litabmas successfully created.');

        } catch (\Exception $e) {
            // Handle any errors that may occur
            return [$e->getMessage()];
            return redirect()->back()
                ->with('error', 'There was an error creating the Tim Litabmas: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit(string $id)
    {
        $menu = 'manage_tim';
        $submenu = 'tim_litabmas';
        $tim = tim_litabmas::findOrFail($id);
        $proposals = proposal::all();

        return view('pages.dosen.manage_tim.form_edit', compact('menu', 'submenu', 'tim', 'proposals'));
    }

    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $request->validate([
            'id_proposal' => 'required|exists:proposals,id',
            'nama' => 'required|string|max:255',
            'tugas' => 'required|string|max:255',
            'status_tim' => 'required|string|max:50',
        ]);

        try {
            // Find the specific record to update
            $timLitabmas = tim_litabmas::findOrFail($id);
            $timLitabmas->id_proposal = $request->id_proposal;
            $timLitabmas->nama = $request->nama;
            $timLitabmas->tugas = $request->tugas;
            $timLitabmas->status_tim = $request->status_tim;

            // Save the updated data to the database
            $timLitabmas->save();

            // Redirect back with a success message
            return redirect()->route('manage_tim.index')
                ->with('success', 'Tim Litabmas successfully updated.');

        } catch (\Exception $e) {
            // Handle any errors that may occur
            return redirect()->back()
                ->with('error', 'There was an error updating the Tim Litabmas: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(string $id)
    {
        $tim = tim_litabmas::findOrFail($id);
        $tim->delete();
        return redirect()->route('manage_tim.index')->with('success', 'Data berhasil dihapus');
    }
}

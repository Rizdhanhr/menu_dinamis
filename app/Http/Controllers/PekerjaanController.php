<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::all();
        return view('pekerjaan.index',compact('pekerjaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'string|required|max:255'
        ]);

         Pekerjaan::create([
            'name' => $request->name
        ]);



        return redirect('/pekerjaan')->with(['success' => 'Data Tersimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        return view('pekerjaan.show',compact('pekerjaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        return view('pekerjaan.edit',compact('pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'string|required|max:255'
        ]);

         Pekerjaan::where('id',$id)->update([
            'name' => $request->name
        ]);



        return redirect('/pekerjaan')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();
        return redirect()->back()->with(['success' => 'Data Terhapus']);
    }
}

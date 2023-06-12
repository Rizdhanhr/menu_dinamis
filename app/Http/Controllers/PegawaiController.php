<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Pekerjaan;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pekerjaan = Pekerjaan::limit(10)->get();
        return view('pegawai.create',compact('pekerjaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'string|required|max:255',
            'pekerjaan' => 'required|not_in:0'
        ]);


         Pegawai::create([
            'name' => $request->name,
            'id_pekerjaan' => $request->pekerjaan
        ]);



        return redirect('/pegawai')->with(['success' => 'Data Tersimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.show',compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pekerjaan = Pekerjaan::all();
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit',compact('pegawai','pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'string|required|max:255',
            'pekerjaan' => 'required'
        ]);

         Pegawai::where('id',$id)->update([
            'name' => $request->name,
            'id_pekerjaan' => $request->pekerjaan
        ]);



        return redirect('/pegawai')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->back()->with(['success' => 'Data Terhapus']);

    }
}

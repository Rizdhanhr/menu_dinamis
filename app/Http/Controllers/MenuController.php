<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $menu = DB::select('SELECT mn.*, menu.name AS parent FROM menu RIGHT JOIN menu mn ON menu.id=mn.parent_id');
        $menu = Menu::with('children','parent')->orderBy('ordering','asc')->get();
        return view('menu.index',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $parent = DB::table('menu')->where('parent_id',0)->get();
        $parent = Menu::where('parent_id',0)->get();
        return view('menu.create',compact('parent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|max:50',
            'page' => 'max:50',
            'parent_id' => 'required',
            'published' => 'required',
            'ordering' => 'required|numeric'
        ]);

        // DB::table('menu')->insert([
        //     'name' => $request->name,
        //     'parent_id' => $request->parent_id,
        //     'page' => $request->page,
        //     'published' => $request->published,
        //     'ordering' => $request->ordering
        // ]);

        Menu::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'page' => $request->page,
            'published' => $request->published,
            'ordering' => $request->ordering,
            'icon' => $request->icon
        ]);

        return redirect('/menu')->with(['success' => 'Data Tersimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $parent = Menu::where('parent_id',0)->get();
        $menu = Menu::findOrFail($id);
        return view('menu.edit',compact('menu','parent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required|max:50',
            'page' => 'max:50',
            'parent_id' => 'required',
            'published' => 'required',
            'ordering' => 'required|numeric'
        ]);

        $menu = Menu::findOrFail($id);
        $menu->name =  $request->name;
        $menu->page =  $request->page;
        $menu->parent_id =  $request->parent_id;
        $menu->published =  $request->published;
        $menu->ordering =  $request->ordering;
        $menu->icon = $request->icon;

        $menu->save();

        return redirect('/menu')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect('/menu')->with(['success' => 'Data Terhapus']);
    }
}

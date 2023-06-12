<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Role;
use App\Models\Menu;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'role' => 'required|unique:roles,rolename|max:50',
            'description' => 'required|max:50'
        ]);

        Role::create([
            'rolename' => $request->role,
            'description' => $request->description,
        ]);

        return redirect('/roles')->with(['success' => 'Data Berhasil Disimpan']);
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
        $role = Role::findOrFail($id);
        return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'role' => 'required|max:50',
            'description' => 'required|max:50',
            'status' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->rolename = $request->role;
        $role->description = $request->description;
        $role->status =  $request->status;
        $role->save();

        return redirect('/roles')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect('/roles')->with(['success' => 'Data Terhapus']);
    }

    public function akses($id){
        // $roles = DB::table('roles')->where('id',$id)->first();
        $roles =  Role::where('id',$id)->first();

        $count = DB::table('role_menu')->where('role_id',$id)->get();

        if($count->isEmpty()){
            $menu = DB::table('menu')
            ->where('menu.parent_id','<>', 0)
            ->get();
        }else{
            $menu = DB::table('menu')
            ->join('role_menu','role_menu.menu_id','menu.id')
            ->where('menu.parent_id','<>', 0)
            ->where('role_menu.role_id',$id)
            ->get();
        }
        // $menu = Menu::where('parent_id','<>', 0)->get();


        // $menu = DB::table('menu')->where('parent_id','<>',0)->get();
        return view('roles.akses',compact('roles','menu'));
    }

    public function change(Request $request){
        // $jum =  $request->jum;
        $id_menu = $request->id_menu;
        $id_role = $request->id_role;
        // $read = $request->read;
        // $create = $request->create;
        // $update = $request->update;
        // $delete = $request->delete;
        $hitung =  DB::table('role_menu')->where('role_id',$id_role)->get();

            if($hitung->isEmpty()){
                foreach($id_menu as  $i => $menu_id){
                    DB::table('role_menu')->insert([
                        'role_id' => $id_role,
                        'menu_id' => $menu_id,
                        'can_create' => isset($request->create[$menu_id]) ? 1 : 0,
                        'can_read' => isset($request->read[$menu_id]) ? 1 : 0,
                        'can_update' => isset($request->update[$menu_id]) ? 1 : 0,
                        'can_delete' => isset($request->delete[$menu_id]) ? 1 : 0,
                    ]);
                }
                // for($i=0; $i<$jum; $i++){
                //     DB::table('role_menu')->insert([
                //         'role_id' => $id_role,
                //         'menu_id' => $id_menu[$i],
                //         'can_create' => $create[$i],
                //         'can_read' => $read[$i],
                //         'can_update' => $update[$i],
                //         'can_delete' => $delete[$i]
                //     ]);
                // }
            }else{
                DB::table('role_menu')->where('role_id',$id_role)->delete();
                // for($i=0; $i<$jum; $i++){
                //     DB::table('role_menu')->insert([
                //         'role_id' => $id_role,
                //         'menu_id' => $id_menu[$i],
                //         'can_create' => $create[$i],
                //         'can_read' => $read[$i],
                //         'can_update' => $update[$i],
                //         'can_delete' => $delete[$i]
                //     ]);
                // }

                foreach($id_menu as  $i => $menu_id){
                    DB::table('role_menu')->insert([
                        'role_id' => $id_role,
                        'menu_id' => $menu_id,
                        'can_create' => isset($request->create[$menu_id]) ? 1 : 0,
                        'can_read' => isset($request->read[$menu_id]) ? 1 : 0,
                        'can_update' => isset($request->update[$menu_id]) ? 1 : 0,
                        'can_delete' => isset($request->delete[$menu_id]) ? 1 : 0,
                    ]);
                }
            }

            return redirect('/roles')->with(['success' => 'Data Role Diperbarui']);

    }
}

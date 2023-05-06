<?php

namespace App\Http\Controllers;

use DB, Hash, Auth;
use App\Models\User;
use App\Models\Kelas;
use App\Models\ref_agama;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_users', ['only' => ['index','show']]);
         $this->middleware('permission:add_users', ['only' => ['create','store']]);
         $this->middleware('permission:edit_users', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_users', ['only' => ['destroy']]);
         $this->middleware('permission:import_users', ['only' => ['import', 'saveimport']]);
         $this->middleware('permission:export_users', ['only' => ['export']]);
    }
    
    public function index(Request $request, $role)
    {   
        $users = User::getUser($role, false, true);
        return view('users.index', compact('users', 'role'));
    }

    public function create(Request $request, $role)
    {   
        $provinsis = DB::table('ref_provinsis')->get();
        $agamas = ref_agama::all();
        return view('users.create', compact('provinsis', 'agamas', 'role'));
    }

    public function store(StoreUserRequest $request, $role)
    {   
        $data = [
            'profil' => isset($data['profil']) ? $data['profil'] : '/img/profil.png',
            'sekolah_id' => Auth::user()->sekolah_id,
            'email' => $request->email
        ];

        $request->validate([
            'nip' => 'required|unique:users'
        ]);

        $data += ['nip' => $request->nip];
         
        if ($request->file('profil')) {
            $data['profil'] = $request->file('profil')->store('profil');
        }
        
        $user = User::create($data);
        $user->assignRole($role);

        app('App\Http\Controllers\ProfileUserController')->store($user, $request, $role);

        return redirect()->route('users.index', [$role])->with('msg_success', 'Berhasil menambahkan ' . $role);
    }

    
    public function show(Request $request, $role, $id){
        $this->check_user($id, $role);
        $user = User::findUser($role, $id);
        return view('users.show', compact('user', 'role'));
    }

    public function edit(Request $request, $role, $id)
    {   
        $this->check_user($id, $role);
        $tahun_ajaran = TahunAjaran::getTahunAjaran($request);
        $data = User::findUser($role, $id);
        $provinsis = DB::table('ref_provinsis')->get();
        $agamas = ref_agama::all();
       
        return view('users.update', compact('provinsis', 'agamas', 'role', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $role, $id)
    {
        $user = User::findOrFail($id);
        $data = [
            'sekolah_id' => Auth::user()->sekolah_id,
            'email' => $request->email,
            'nip' => $request->nip
        ];
        
        if ($request->file('profil')) {
            if($user->profil != '/img/profil.png'){
                Storage::delete($user->profil);
            }
            $data['profil'] = $request->file('profil')->store('profil');
        }
        
        $user->update($data);

        app('App\Http\Controllers\ProfileUserController')->update($user, $request, $role);

        return TahunAjaran::redirectWithTahunAjaranManual(route('users.index', [$role]), $request,  'Berhasil mengupdate ' . $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $role, $id)
    {   
        dd('perlu diperbaiki');
    }

    public function import(Request $request, $role){
        $data = ['role' => $role];
        return view('users.import',$data);
    }

    public function store_import(Request $request, $role){
        $excel = Excel::import(new UsersImport($role, $request), $request->file('file'));
        return TahunAjaran::redirectWithTahunAjaranManual(route('users.index', [$role]), $request,  'Berhasil mengimport ' . $role);
    }

    public function export(Request $request, $role){
        return Excel::download(new UsersExport($role, $request), $role.'.xlsx');
    }
}

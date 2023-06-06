<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\User;
use App\Http\Requests\StoreSekolahRequest;
use App\Http\Requests\UpdateSekolahRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class SekolahController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view_sekolah', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_sekolah', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_sekolah', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_sekolah', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = Sekolah::all();

        return view('sekolah.index', [
            'schools' => $schools
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSekolahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSekolahRequest $request)
    {
        DB::beginTransaction();
        try {
            $sekolah = Sekolah::create([
                'nama' => $request->nama_sekolah,
                'kode' => $request->kode,
                'kepala_sekolah' => $request->kepala_sekolah,
                'npsn' => $request->npsn,
                'jenjang' => $request->jenjang,
                'alamat' => $request->alamat,
                'jam_masuk' => $request->jam_masuk,
                'jam_pulang' => $request->jam_pulang,
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => \Hash::make($request->password),
                'sekolah_id' => $sekolah->id
            ]);

            DB::commit();

            $user->assignRole('admin');
            return redirect()->route('sekolah.index')->with('msg_success', "Berhasil Ditambahkan");
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('sekolah.index')->with('msg_error', "Gagal Ditambahkan");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show(Sekolah $sekolah)
    {
        return view('sekolah.show', compact('sekolah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekolah $sekolah)
    {
        $sekolah = Sekolah::with('user')->find($sekolah->id);
        return view('sekolah.create', compact('sekolah'));
        // abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSekolahRequest  $request
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSekolahRequest $request, Sekolah $sekolah)
    {
        $admin = User::where('sekolah_id', $sekolah->id)->first();
        $data = [
            'nama' => $request->nama_sekolah,
            'kode' => $request->kode,
            'npsn' => $request->npsn,
            'kepala_sekolah' => $request->kepala_sekolah,
            'alamat' => $request->alamat,
            'jam_masuk' => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang,
        ];

        $user = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $request->password ? $user['password'] = \Hash::make($request->password) : '';

        if($request->profile){
            $path = Storage::disk('public')->putFile('profile', $request->profile);
            $user['profil'] = $path;
        }

        if (Storage::disk('public')->exists("$admin->profil")) {
            Storage::disk('public')->delete("$admin->profil");
        }

        $admin->update($user);

        if ($request->logo) {
            if ($sekolah->logo != '/img/tutwuri.png	') {
                Storage::delete($sekolah->logo);
            }
            $data += ['logo' => $request->file('logo')->store('logo')];
        }

        $sekolah->update($data);
        return redirect()->route('sekolah.index')->with('msg_success', 'Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekolah $sekolah)
    {
        foreach ($sekolah->user as $key => $user) {
            User::deleteUser($user->getRoleNames()[0], $user->id);
        }

        foreach ($sekolah->kelas as $key => $kelas) {
            $kelas->delete();
        }

        $sekolah->delete();

        return redirect()->back()->with('msg_success', 'Sekolah berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuangRequest;
use App\Models\Jurusan;
use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Ruang::all();

        return $datas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Jurusan::all();
        return view('ruang.create', compact('datas')); //change this
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuangRequest $request)
    {
        $create = Ruang::create([
            'name' => $request->name,
            'jurusan_id' => $request->jurusan_id,
            'bisa_dipinjam' => $request->bisa_dipinjam == 'on' ? true : false,
        ]);

        if(!$create){
            return response()->json([
                'massages' => "Failed To Be Created"
            ], 400);
        }

        return redirect('/ruang'); //change this
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruang = Ruang::find($id);
        return $ruang;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruang = Ruang::find($id);

        $datas = Jurusan::all();
        return view('ruang.edit', compact('ruang', 'datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RuangRequest $request, $id)
    {
        $find = Ruang::find($id);

        if(!$find){
            return response()->json([
                'massages' => "Updated data not found"
            ], 404);
        }

        $update = $find->update([
            'name' => $request->name,
            'jurusan_id' => $request->jurusan_id,
            'bisa_dipinjam' => $request->bisa_dipinjam == 'on' ? true : false,
        ]);

        if(!$update){
            return response()->json([
                'massages' => "data failed to update"
            ], 400);
        }

        return redirect('/'); //change this
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Ruang::find($id);

        if(!$find){
            return response()->json([
                'massages' => "Updated data not found"
            ], 404);
        }

        $destroy = $find->delete();

        if(!$destroy){
            return response()->json([
                'massages' => "data failed to delete"
            ], 400);
        }

        return redirect('/'); //change this!
    }
}

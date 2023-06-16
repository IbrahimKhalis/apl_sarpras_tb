<?php

namespace App\Http\Controllers;

use App\Models\m_faq;
use Illuminate\Http\Request;
use App\Http\Requests\FAQRequest;

class MFaqController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view_faq', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_faq', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_faq', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_faq', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = m_faq::all();
        return view('faq.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faq.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FAQRequest $request)
    {
        m_faq::create([
            'judul' => $request->judul,
            'konten' => $request->konten
        ]);

        return redirect()->route('faq.index')->with('msg_success', 'Berhasil menambahkan FAQ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\m_faq  $m_faq
     * @return \Illuminate\Http\Response
     */
    public function show(m_faq $m_faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\m_faq  $m_faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = m_faq::findOrFail($id);
        return view('faq.form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\m_faq  $m_faq
     * @return \Illuminate\Http\Response
     */
    public function update(FAQRequest $request, $id)
    {
        $data = m_faq::findOrFail($id);
        $data->update([
            'judul' => $request->judul,
            'konten' => $request->konten
        ]);
        return redirect()->route('faq.index')->with('msg_success', 'Berhasil mengubah FAQ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\m_faq  $m_faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = m_faq::findOrFail($id);
        $data->delete();
        return redirect()->route('faq.index')->with('msg_success', 'Berhasil menghapus FAQ');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Pegawai::paginate(5); // 5 record per pages, silahkan disesuaikan
        return view('pegawai.list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip'           => 'required',
            'nama_pegawai'  => 'required',
            'alamat'        => 'required'
        ]);

        $data = new Pegawai([
            'nip'           => $request->get('nip'),
            'nama_pegawai'  => $request->get('nama_pegawai'),
            'alamat'        => $request->get('alamat')
        ]);
        $data->save();
        return redirect('/pegawai')->with('success', 'Pegawai saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pegawai::find($id);
        return view('pegawai.view', compact('data'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pegawai::find($id);
        return view('pegawai.edit', compact('data'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nip'           => 'required',
            'nama_pegawai'  => 'required',
            'alamat'        => 'required'
        ]);
        $data = Pegawai::find($id);
        $data->nip          = $request->get('nip');
        $data->nama_pegawai = $request->get('nama_pegawai');
        $data->alamat       = $request->get('alamat');
        $data->save();
        return redirect('/pegawai')->with('success', 'Record updated!');
    }

    public function delete($id)
    {
        $data = Pegawai::find($id);
        return view('pegawai.delete', compact('data'));        
    }
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pegawai::find($id);
        $data->delete();
        return redirect('/pegawai')->with('success', 'Record deleted!');
    }
}

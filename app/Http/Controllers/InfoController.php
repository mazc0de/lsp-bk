<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Info::all();
        return view('admin.info.index', compact('datas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.info.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $request->validate(Info::$rules);
        $requests = $request->all();

        $store = Info::create($requests);
        if($store){
            return redirect('admin/info')->with('status','Berhasil Menambahkan Data!');
        }
        return redirect('admin/info')->with('status','Gagal Menambahkan Data!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Info::find($id);
        return view('admin.info.edit',compact('data'));
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
        $infoId = Info::find($id);
        if ($infoId == null) {
            return redirect('admin/info')->with('status', 'Info tidak ditemukan!');
        }
        $req = $request->all();
        $data = Info::find($id)->update($req);
        if ($data) {
            return redirect('admin/info')->with('status', 'Berhasil Mengubah Data');
        }
        return redirect('admin/info')->with('status', 'Gagal Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $infoId = Info::find($id);
        if ($infoId == null) {
            return redirect('admin/info')->with('status', 'Data tidak ditemukan !');
        }
        $delete = $infoId->delete();
        if ($delete) {
            return redirect('admin/info')->with('status', 'Berhasil Hapus Data!');
        }
        return redirect('admin/info')->with('status', 'Gagal Hapus Data!');
    }
}

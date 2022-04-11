<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RunningText;

class RunningTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RunningText::all();

        return view('admin.runningtext.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.runningtext.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $request->validate(RunningText::$rules);
        $requests = $request->all();

        $store = RunningText::create($requests);
        if($store){
            return redirect('admin/runningtext')->with('status','Berhasil Menambahkan Data!');
        }
        return redirect('admin/runningtext')->with('status','Gagal Menambahkan Data!');

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
        $data = RunningText::find($id);
        return view('admin.runningtext.edit',compact('data'));
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
        $runningTextId = RunningText::find($id);
        if ($runningTextId == null) {
            return redirect('admin/runningtext')->with('status', 'Data tidak ditemukan!');
        }
        $req = $request->all();
        $data = RunningText::find($id)->update($req);
        if ($data) {
            return redirect('admin/runningtext')->with('status', 'Berhasil Mengubah Data');
        }
        return redirect('admin/runningtext')->with('status', 'Gagal Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $runningTextId = RunningText::find($id);
        if ($runningTextId == null) {
            return redirect('admin/runningtext')->with('status', 'Data tidak ditemukan !');
        }
        $delete = $runningTextId->delete();
        if ($delete) {
            return redirect('admin/runningtext')->with('status', 'Berhasil Hapus Data!');
        }
        return redirect('admin/runningtext')->with('status', 'Gagal Hapus Data!');
    }
}

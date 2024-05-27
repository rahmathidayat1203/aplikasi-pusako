<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Ruangan::get();
            return DataTables::of($query)->make();
        }

        return view ('pages.ruangan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'catatan' => 'required',
        ]);
        
        $data = $request->all();

        Ruangan::create($data);

        return redirect('ruangan')->with('toast', 'showToast("Data berhasil disimpan")');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        return view('ruangan.show',compact('ruangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        $item = Ruangan::findOrFail($id);

        return view('pages.ruangan.edit',[
            'item'  =>  $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $ruangan = Ruangan::findOrFail($id);

        $data = [
            'nama' => $request->nama,
            'catatan' => $request->catatan,
        ];

        $ruangan->update($data);

        return redirect('ruangan')->with('toast', 'showToast("Data berhasil diupdate")');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Ruangan::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('toast', 'showToast("Data berhasil dihapus")');
    }
}
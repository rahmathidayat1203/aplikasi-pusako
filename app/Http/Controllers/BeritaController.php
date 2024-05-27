<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Berita::get();
            return DataTables::of($query)->make();
        }

        return view ('pages.berita.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'required',
            'kategori' => 'required',
        ]);
        
        $data = $request->all();

        Berita::create($data);

        return redirect('berita')->with('toast', 'showToast("Data berhasil disimpan")');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $berita= Berita::findOrFail($id);
        return view('berita.show',compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        $item = Berita::findOrFail($id);

        return view('pages.berita.edit',[
            'item'  =>  $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $berita = Berita::findOrFail($id);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $request->foto,
            'kategori' => $request->kategori,
        ];

        $berita->update($data);

        return redirect('berita')->with('toast', 'showToast("Data berhasil diupdate")');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Berita::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('toast', 'showToast("Data berhasil dihapus")');
    }
}
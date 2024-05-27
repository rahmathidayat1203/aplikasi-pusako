<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Dokter::get();
            return DataTables::of($query)->make();
        }

        return view ('pages.dokter.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'nohp' => 'required',
            'email' => 'required',
        ]);
        
        $data = $request->all();

        Dokter::create($data);

        return redirect('dokter')->with('toast', 'showToast("Data berhasil disimpan")');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Dokter = Dokter::findOrFail($id);
        return view('dokter.show',compact('dokter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        $item = Dokter::findOrFail($id);

        return view('pages.dokter.edit',[
            'item'  =>  $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $dokter = Dokter::findOrFail($id);

        $data = [
            'nama' => $request->nama,
            'nip' => $request->nip,
            'nohp' => $request->nohp,
            'email' => $request->email,
        ];

        $dokter->update($data);

        return redirect('dokter')->with('toast', 'showToast("Data berhasil diupdate")');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Dokter::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('toast', 'showToast("Data berhasil dihapus")');
    }
}
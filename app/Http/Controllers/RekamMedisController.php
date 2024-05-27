<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = RekamMedis::get();
            return DataTables::of($query)->make();
        }

        return view ('pages.rekammedis.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.rekammedis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'keluhan' => 'required',
            'diagnosa' => 'required',
            'resep' => 'required',
            'tindakan' => 'required',
        ]);
        
        $data = $request->all();

        RekamMedis::create($data);

        return redirect('rekam-medis')->with('toast', 'showToast("Data berhasil disimpan")');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $RekamMedis= RekamMedis::findOrFail($id);
        return view('rekammedis.show',compact('rekammedis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        $item = RekamMedis::findOrFail($id);

        return view('pages.rekammedis.edit',[
            'item'  =>  $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $rekammedis = RekamMedis::findOrFail($id);

        $data = [
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter,
            'keluhan' => $request->keluhan,
            'diagnosa' => $request->diagnosa,
            'resep' => $request->resep,
            'tindakan' => $request->tindakan,
        ];

        $rekammedis->update($data);

        return redirect('rekammedis')->with('toast', 'showToast("Data berhasil diupdate")');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = RekamMedis::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('toast', 'showToast("Data berhasil dihapus")');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class AntreanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Antrean::get();
            return DataTables::of($query)->make();
        }

        return view ('pages.antrean.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.antrean.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required',
            'id_pasien' => 'required',
            'nomor_antrean' => 'required',
            'waktu_antrean' => 'required',
            'waktu_panggil' => 'required',
            'waktu_keluar' => 'required',
            'rating' => 'required',
            'komentar' => 'required',
        ]);
        
        $data = $request->all();

        Antrean::create($data);

        return redirect('antrean')->with('toast', 'showToast("Data berhasil disimpan")');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Antrean= Antrean::findOrFail($id);
        return view('antrean.show',compact('antrean'));
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        $item = Antrean::findOrFail($id);

        return view('pages.antrean.edit',[
            'item'  =>  $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $antrean = Antrean::findOrFail($id);

        $data = [
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter,
            'nomor_antrean' => $request->nomor_antrean,
            'waktu_antrean' => $request->waktu_antrean,
            'waktu_panggilan' => $request->waktu_panggilan,
            'waktu_keluar' => $request->waktu_keluar,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ];

        $antrean->update($data);

        return redirect('antrean')->with('toast', 'showToast("Data berhasil diupdate")');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Antrean::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('toast', 'showToast("Data berhasil dihapus")');
    }
}
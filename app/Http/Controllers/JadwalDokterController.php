<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class JadwalDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = JadwalDokter::get();
            return DataTables::of($query)->make();
        }

        return view ('pages.jadwaldokter.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jadwaldokter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required',
            'hari' => 'required',
            'id_ruangan' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
        
        $data = $request->all();

        JadwalDokter::create($data);

        return redirect('jadwal-dokter')->with('toast', 'showToast("Data berhasil disimpan")');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jadwaldokter = JadwalDokter::findOrFail($id);
        return view('pages.jadwaldokter.show',compact('jadwaldokter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        $item = JadwalDokter::findOrFail($id);

        return view('pages.jadwaldokter.edit',[
            'item'  =>  $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $jadwaldokter = JadwalDokter::findOrFail($id);

        $data = [
            'id_dokter' => $request->id_dokter,
            'hari' => $request->hari,
            'id_ruangan' => $request->id_ruangan,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ];

        $jadwaldokter->update($data);

        return redirect('jadwaldokter')->with('toast', 'showToast("Data berhasil diupdate")');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = JadwalDokter::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('toast', 'showToast("Data berhasil dihapus")');
    }
}
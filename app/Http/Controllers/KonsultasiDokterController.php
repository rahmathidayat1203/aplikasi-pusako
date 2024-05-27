<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\KonsultasiDokter;
use App\Models\Pasien;
use Faker\Provider\de_DE\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class KonsultasiDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = KonsultasiDokter::get();
            return DataTables::of($query)->make();
        }

        return view ('pages.konsultasidokter.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dokters = Dokter::get();
        $pasiens = Pasien::get();

    return view('pages.konsultasidokter.create',compact('dokters','pasiens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'pertanyaan_pasien' => 'required',
            'jawaban_dokter' => 'required',
        ]);
        
        $data = $request->all();


        KonsultasiDokter::create($data);

        return redirect('konsultasi-dokter')->with('toast', 'showToast("Data berhasil disimpan")');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $KonsultasiDokter= KonsultasiDokter::findOrFail($id);
        return view('konsultasidokter.show',compact('konsultasidokter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        $item = KonsultasiDokter::findOrFail($id);

        return view('pages.konsultasidokter.edit',[
            'item'  =>  $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $konsultasidokter = KonsultasiDokter::findOrFail($id);

        $data = [
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter,
            'pertanyaan_pasien' => $request->pertanyaan_pasien,
            'jawaban_dokter' => $request->jawaban_dokter,
        ];

        $konsultasidokter->update($data);

        return redirect('konsultasidokter')->with('toast', 'showToast("Data berhasil diupdate")');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = KonsultasiDokter::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('toast', 'showToast("Data berhasil dihapus")');
    }
}
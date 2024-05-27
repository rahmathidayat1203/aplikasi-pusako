<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function riwayatPasien(){
        $data['pasiens'] = Pasien::all();
        return response()->json($data);
    }

    public function profile(Request $request){
        $data['user'] = $request->user();
        return response()->json($data);
    }

    public function updateProfile(Request $request){
        $user = $request->user();
        $data = User::where('id','=',$user->id)->first();
        $pasien = Pasien::where('nama','=',$data->name)->update($request->all());

        return response()->json([
            'message' => 'success'
        ]);

    }
}

<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            Log::info($request->all());

            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'nohp' => 'required',
                'password' => 'required',
                'email' => 'required',
                'jenis_kelamin' => 'required',
                'tanggal_lahir'=> 'required',
                'tinggi_badan' => 'required',
                'berat_badan' => 'required'
            ]);
            $user = new User();
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = "user";
            $user->username = $request->email;
            $user->save();

            $pasien = new Pasien();
            $pasien->nama = $request->nama;
            $pasien->nik = $request->nik;
            $pasien->email = $request->email;
            $pasien->nohp = $request->nohp;
            $pasien->jenis_kelamin = $request->jenis_kelamin;
            $pasien->tanggal_lahir = $request->tanggal_lahir;
            $pasien->tinggi_badan = $request->tinggi_badan;
            $pasien->berat_badan = $request->berat_badan;
            $pasien->save();

            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => null
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'message' => 'failed',
                'data' => $e->getMessage()
            ]);
        }
    }
    public function login(Request $request)
    {
        try {
            $request->validate([
                'nik' => 'required|nik',
                'password' => 'required',
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }
            return response()->json([
                'token' => $user->createToken('token')->plainTextToken
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
    public function user(Request $request)
    {
        return $request->user();
    }
    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json(['message' => 'Successfully logged out']);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}

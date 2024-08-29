<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class PegawaiController extends Controller
{

    private $apiUrl = 'https://66c6763b134eb8f43497a8a0.mockapi.io/nyoba/pegawai';

    public function index()
    {
        $response = Http::get($this->apiUrl);
        $data = $response->json();
        $pegawaiCount = count($data);

        return view('page.pegawai', compact('data', 'pegawaiCount'));
    }


    public function update(Request $request, $id)
    {
        $response = Http::put("{$this->apiUrl}/{$id}", $request->all());

        if ($response->successful()) {
            return response()->json(['message' => 'Data berhasil diupdate']);
        }

        return response()->json(['message' => 'Gagal mengupdate data'], 500);
    }


    public function destroy($id)
    {
        $response = Http::delete("{$this->apiUrl}/{$id}");

        if ($response->successful()) {
            return response()->json(['message' => 'Data berhasil dihapus']);
        }

        return response()->json(['message' => 'Gagal menghapus data'], 500);
    }



    public function create()
    {
        return view('page.createpegawai');
    }

    public function store(Request $request)
{    
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255', // Pastikan validasi sesuai dengan data
        'avatar' => 'required|url'
    ]);

    $response = Http::post("{$this->apiUrl}", [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'avatar' => $request->input('avatar'),
    ]);
    return back();
}
}

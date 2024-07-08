<?php

namespace App\Http\Controllers;

use App\Http\Requests\MahasiswaStoreRequest;
use App\Http\Requests\MahasiswaUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index() //nampilin data
    {
        //ambil data
        $mahasiswas = Mahasiswa::all(); //ambil semua data
        return view('mahasiswa', compact('mahasiswas')); //nampilin html, compact buat ngoper data
    }

    public function store(MahasiswaStoreRequest $request)
    {
        Mahasiswa::create([
            'name' => $request['name'],
            'nim' => $request['nim'],
            'universitas' => $request['universitas'],
            'keterangan' => $request['keterangan'],
        ]);

        return redirect()->back(); //kembali kehalaman sebelumnya
    }

    public function update(MahasiswaUpdateRequest $request, $id)
    {
        Mahasiswa::findOrFail($id)->update([
            'name' => $request['name'],
            'nim' => $request['nim'],
            'universitas' => $request['universitas'],
            'keterangan' => $request['keterangan'],
        ]);

            return redirect()->back();
    }

    public function destroy($id)
    {
        Mahasiswa::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $mahasiswas = Mahasiswa::where('name', 'like', "%{$search}%")
            ->orWhere('nim', 'like', "%{$search}%")
            ->orWhere('universitas', 'like', "%{$search}%")
            ->orWhere('keterangan', 'like', "%{$search}%")
            ->get();

        return view('mahasiswa', compact('mahasiswas'));
    }
}
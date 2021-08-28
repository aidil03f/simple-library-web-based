<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SiswaResource;
use App\Http\Requests\SiswaRequest;
use App\Models\Siswa;

class SiswaController extends Controller
{
  
    public function index()
    {
        $siswa = Siswa::get();
        return SiswaResource::collection($siswa);
    }


    public function store(SiswaRequest $request)
    {
        Siswa::create(['nama_siswa' => request('nama_siswa'),'kelas_id'=> request('kelas_id')]);
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $siswa->kelas;
        return response()->json($siswa);
    }

    public function update(SiswaRequest $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->update(['nama_siswa' => request('nama_siswa'),'kelas_id'=> request('kelas_id')]);

        return new SiswaResource($siswa);
    }


    public function destroy($id)
    {
        Siswa::find($id)->delete();
        return response()->json('deleted',200);
    }
}

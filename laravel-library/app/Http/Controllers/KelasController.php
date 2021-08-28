<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\KelasResource;
use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
class KelasController extends Controller
{

    public function index()
    {
        $kelas = Kelas::get();
        return KelasResource::collection($kelas);
    }


    public function store(KelasRequest $request)
    {
        Kelas::create(['nama_kelas' => request('nama_kelas')]);
    }

    public function edit($id)
    {
         return Kelas::find($id);
    }

    public function update(KelasRequest $request, $id)
    {
        $kelas = Kelas::find($id);
        $kelas->update(['nama_kelas' => request('nama_kelas')]);

        return new KelasResource($kelas);
    }


    public function destroy($id)
    {
        $kelas = Kelas::find($id)->delete();
        return response()->json('deleted',200);
    }
}

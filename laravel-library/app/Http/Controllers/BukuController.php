<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BukuResource;
use App\Http\Requests\BukuRequest;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::get();
        return BukuResource::collection($buku);
    }


    public function store(BukuRequest $request)
    {
        Buku::create(['jenis_id' => request('jenis_id'),'nama_buku' => request('nama_buku')]);
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        $buku->jenisbuku;
        return response()->json($buku);
    }

    public function update(BukuRequest $request, $id)
    {
        $buku = Buku::find($id);
        $buku->update(['jenis_id' => request('jenis_id'),'nama_buku' => request('nama_buku')]);

        return new BukuResource($buku);
    }


    public function destroy($id)
    {
        Buku::find($id)->delete();
        return response()->json('deleted',200);
    }
}

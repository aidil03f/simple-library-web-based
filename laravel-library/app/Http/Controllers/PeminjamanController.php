<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PeminjamanResource;
use App\Http\Requests\PeminjamanRequest;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::get();
        return PeminjamanResource::collection($peminjaman);
    }


    public function store(PeminjamanRequest $request)
    {
        Peminjaman::create([
            'siswa_id' => request('siswa_id'),
            'buku_id' => request('buku_id'),
            'tanggal_peminjaman' => request('tanggal_peminjaman'),
            'tanggal_pengembalian' => request('tanggal_pengembalian')
        ]);
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->siswa;
        $peminjaman->buku;
        return response()->json($peminjaman);
    }


    public function update(PeminjamanRequest $request, $id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->update([
            'siswa_id' => request('siswa_id'),
            'buku_id' => request('buku_id'),
            'tanggal_peminjaman' => request('tanggal_peminjaman'),
            'tanggal_pengembalian' => request('tanggal_pengembalian')
        ]);

        return new PeminjamanResource($peminjaman);
    }


    public function destroy($id)
    {
        Peminjaman::find($id)->delete();
        return response()->json('deleted',200);
    }
}

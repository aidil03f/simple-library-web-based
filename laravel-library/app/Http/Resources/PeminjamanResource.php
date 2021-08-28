<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PeminjamanResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'siswa_id' => $this->siswa_id,
            'namasiswa' => $this->siswa->nama_siswa,
            'buku_id' => $this->buku_id,
            'namabuku' => $this->buku->nama_buku,
            'tanggal_peminjaman' => date('d-m-Y', strtotime($this->tanggal_peminjaman)),
            'tanggal_pengembalian' => date('d-m-Y', strtotime($this->tanggal_pengembalian)),
            'created_at' => $this->created_at->format('d-m-Y H:i'),
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
        ];
    }
}

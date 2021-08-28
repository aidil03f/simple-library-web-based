<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_siswa' => $this->nama_siswa,
            'kelas_id' => $this->kelas_id,
            'nama_kelas' => $this->kelas->nama_kelas,
            'created_at' => $this->created_at->format('d-m-Y H:i'),
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
        ];
    }
}

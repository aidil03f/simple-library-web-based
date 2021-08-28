<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BukuResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'jenis_id' => $this->jenis_id,
            'jenisbuku' => $this->jenisbuku->label,
            'nama_buku' => $this->nama_buku,
            'created_at' => $this->created_at->format('d-m-Y H:i'),
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
        ];
    }
}

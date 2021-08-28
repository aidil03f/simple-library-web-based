<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KelasResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_kelas' => $this->nama_kelas,
            'created_at' => $this->created_at->format('d-m-Y H:i'),
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
        ];
    }
}

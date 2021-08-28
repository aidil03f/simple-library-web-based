<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JenisBukuResource extends JsonResource
{
   
    public function toArray($request)
    {
       
        return [
            'id' => $this->id,
            'label' => $this->label,
            'created_at' => $this->created_at->format('d-m-Y H:i'),
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
        ];
    }
}

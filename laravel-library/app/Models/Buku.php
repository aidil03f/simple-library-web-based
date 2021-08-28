<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable = ['jenis_id','nama_buku'];

    public function jenisbuku()
    {
        return $this->belongsTo(JenisBuku::class,'jenis_id');
    }
}

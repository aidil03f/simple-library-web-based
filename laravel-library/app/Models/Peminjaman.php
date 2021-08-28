<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = ['siswa_id','buku_id','tanggal_peminjaman','tanggal_pengembalian'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'siswa_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class,'buku_id');
    }
}

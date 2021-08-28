<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['kelas_id','nama_siswa'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
}

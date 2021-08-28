<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run()
    {
        $seeder = collect([
           
            'kelas1',
            'kelas2',
            'kelas3',
            'kelas4',
         ]);
 
         $seeder->each(function($data){
             Kelas::create([
                 'nama_kelas' => $data
             ]);
         });
    }
}

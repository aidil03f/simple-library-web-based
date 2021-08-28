<?php

namespace Database\Seeders;

use App\Models\JenisBuku;
use Illuminate\Database\Seeder;

class JenisBukuSeeder extends Seeder
{
    public function run()
    {
        $seeder = collect([
           
            'label1',
            'label2',
            'label3',
            'label4',
         ]);
 
         $seeder->each(function($data){
                JenisBuku::create([
                 'label' => $data
             ]);
         });
    }
}

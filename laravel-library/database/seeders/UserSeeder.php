<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
 
    public function run()
    {
        User::create([
            'name' => 'Jhon Doe',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
    }
}

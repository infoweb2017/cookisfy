<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Cookisfy',          
            'email' => 'cookisfy@gmail.com',    
            'password' => Hash::make('Cookisfy_2024'),  
            'is_admin' => true,                // Establece el flag de administrador
            //'profile_image_id' => 1,        // Si necesitas asignar una imagen de perfil
        ]);
    }
}

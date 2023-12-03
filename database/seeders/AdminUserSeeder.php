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
            'name' => 'Frank',            // Nombre del usuario administrador
            'email' => 'admin@frankrm.com',    // Email del usuario administrador
            'password' => Hash::make('1234567'),  
            'is_admin' => true,                // Establece el flag de administrador
            // 'profile_image_id' => 1,        // Si necesitas asignar una imagen de perfil
        ]);
    }
}

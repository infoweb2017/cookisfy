<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Método para mostrar el index del administrador
    public function index()
    {
        return view('admin.bienvenido');
    }

    // Método para mostrar una lista de usuarios
    public function listUsers()
    {
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }

    // Método para editar un usuario
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('users'));
    }

    // Método para actualizar un usuario
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        

        return redirect()->route('admin.users.edit')->with('success', 'Usuario actualizado correctamente');
    }

    // Método para eliminar un usuario
    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.list')->with('success', 'Usuario eliminado correctamente');
    }

}

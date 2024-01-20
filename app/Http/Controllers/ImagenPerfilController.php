<?php

namespace App\Http\Controllers;

use App\Models\imagen_perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenPerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        // Validación del archivo de imagen
        $request->validate([
            'imagen_perfil' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Permite imágenes JPEG, PNG, JPG y GIF de hasta 2MB
        ]);

        // Procesar la imagen y guardarla en el sistema de archivos
        if ($request->hasFile('imagen_perfil')) {
            // Eliminar la foto de perfil anterior si existe
            if ($user->imagen_perfil) {
                Storage::delete($user->imagen_perfils);
            }

            // Almacenar la nueva foto de perfil en el sistema de archivos
            $rutaFoto = $request->file('imagen_perfil')->store('images/img_usuario');

            // Actualizar el campo 'foto_perfil' en la base de datos
            $user->update([
                'imagen_perfil' => $rutaFoto,
            ]);
        }

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->back()->with('success', 'Foto de perfil actualizada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(imagen_perfil $imagen_perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(imagen_perfil $imagen_perfil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, imagen_perfil $imagen_perfil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(imagen_perfil $imagen_perfil)
    {
        //
    }
}

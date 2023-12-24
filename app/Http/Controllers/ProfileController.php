<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Mostrar el formulario de perfil del usuario.
     */
    public function editar(Request $request): View
    {
        return view('perfil.editar', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Actualizar la información del perfil del usuario.
     */
    public function update(ProfileUpdateRequest $request,): RedirectResponse
    {
        // Obtener el usuario actual
        $user = $request->user();

        // Validar los datos del formulario usando el Request validado
        $validatedData = $request->validated();

        // Comprobar si el campo de correo electrónico ha cambiado
        if ($user->isDirty('email')) {
            // Si ha cambiado, establecer 'email_verified_at' en null para requerir verificación
            $user->email_verified_at = null;
        }

        // Actualizar otros campos del perfil con los datos validados
        $user->fill($validatedData);

        // Manejar la carga de la foto de perfil si está presente en la solicitud
        if ($request->hasFile('imagen_perfil')) {
            // Si se proporciona una nueva imagen, almacenarla y actualizar la columna 'profile_photo'
            $profilePhoto = $request->file('imagen_perfil');
            $profilePhotoPath = $profilePhoto->store('assets/img_usuario', 'public'); // Almacenar la imagen en el sistema de archivos 'public'

            // Actualizar el campo de la foto de perfil en la base de datos
            $user->imagen_perfil = $profilePhotoPath;

            // Guardar los cambios en el usuario
            $user->save();
        }
        return Redirect::route('perfil.editar')->with('status', 'profile-updated');
    }

    /**
     * Eliminar la cuenta del usuario.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('welcome');
    }
}

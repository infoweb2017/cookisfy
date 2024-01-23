<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Mostrar el formulario de perfil del usuario.
     */
    public function editar(Request $request): View
    {
        $user = $request->user();

        // Verifica si el usuario es administrador
        if ($user->isAdmin()) {
            return view('admin.perfil.editar', ['user' => $user]);
        } else {
            return view('perfil.editar', ['user' => $user]);
        }
    }

    /**
     * Actualizar la información del perfil del usuario.
     */
    public function update(ProfileUpdateRequest $request,): RedirectResponse
    {
        return DB::transaction(function () use ($request) {
            // Obtener el usuario actual
            $user = $request->user();

            // Validar los datos del formulario usando el Request validado
            $validatedData = $request->validated();

            // Comprobar si el campo de correo electrónico ha cambiado
            if ($user->isDirty('email')) {
                // Si ha cambiado, establecer 'email_verified_at' en null para requerir verificación
                $user->email_verified_at = null;
                //$user->sendEmailVerificationNotification();

            }

            // Actualizar otros campos del perfil con los datos validados
            $user->fill($validatedData);

            // Manejar la carga de la foto de perfil si está presente en la solicitud
            if ($request->hasFile('imagen_perfil')) {
                // Verificar si la imagen de perfil anterior existe y no es nula
                if ($user->imagen_perfil && is_string($user->imagen_perfil)) {
                    // Eliminar la imagen de perfil anterior
                    Storage::disk('public')->delete($user->imagen_perfil);
                }
            
                // Subir la nueva imagen de perfil
                $profilePhotoPath = $request->file('imagen_perfil')->store('images/img_usuario', 'public');
            
                // Actualizar el campo de la foto de perfil en la base de datos
                $user->imagen_perfil = $profilePhotoPath;
            
                // Guardar los cambios en el usuario
                $user->save();
            }
            return Redirect::route('perfil.editar')->with('status', 'profile-updated');
        }, 5);
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

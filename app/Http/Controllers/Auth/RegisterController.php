<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\newUsuarioMail;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\NewUserRegistered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | Este controlador gestiona el registro de nuevos usuarios así como su
    | validación y creación. Por defecto este controlador utiliza un trait para
    | proporcionar esta funcionalidad sin necesidad de código adicional.
    |
    */

    use RegistersUsers;

    /**
     * Dónde redirigir a los usuarios tras el registro.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Crear una nueva instancia de controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Obtener un validador para una solicitud de registro entrante. request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Crear una nueva instancia de usuario tras un registro válido.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return $user;
    }
    public function register(Request $request)
    {
        // Registra al usuario utilizando el método create del controlador
        $user = $this->create($request->all());
    
        // Si el usuario se registró con éxito, envía la notificación al administrador
        if ($user) {
            $admin = User::where('is_admin', true)->first(); // Obtén al usuario administrador
            if ($admin) {
                $admin->notify(new NewUserRegistered($user)); // Envía la notificación al administrador
                Mail::to($admin)->send(new NewUsuarioMail($user)); // Envía un correo al administrador
            }
        }
    
        return redirect($this->redirectTo); // Redirige al usuario después del registro
    }
}

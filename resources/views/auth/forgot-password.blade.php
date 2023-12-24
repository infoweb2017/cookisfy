
@extends('layouts.app')

@section('content')
<h2>Restablecer Contraseña Olvidada</h2>
<div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
    ¿Ha olvidado su contraseña? No se preocupe. Indíquenos su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.
</div>

<!-- Estado de la sesión -->
<div class="mb-4">
    @if(session('status'))
        <div class="text-green-600">
            {{ session('status') }}
        </div>
    @endif
</div>

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Dirección de correo electrónico -->
    <div>
        <label for="email">E-mail</label>
        <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autofocus />
        @error('email')
            <div class="mt-2 text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="flex items-center justify-end mt-4">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-800">
            Enlace de restablecimiento de contraseña
        </button>
    </div>
</form>

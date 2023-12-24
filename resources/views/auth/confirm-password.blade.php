@extends('layouts.app')

@section('content')
    <h2>Confirmación de Contraseña de Administrador</h2>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Esta es una zona segura de la aplicación. Confirme su contraseña de administrador antes de continuar.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Contraseña -->
        <div>
            <label for="password">Contraseña</label>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            @error('password')
                <div class="mt-2 text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-800">
                Confirmar
            </button>
        </div>
    </form>
@endsection

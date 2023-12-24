@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Token de restablecimiento de contraseña -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Correo electronico -->
        <div>
            <label for="email">Email</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email"
                value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
            @error('email')
                <div class="mt-2 text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <label for="password">Password</label>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            @error('password')
                <div class="mt-2 text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirmar contraseña -->
        <div class="mt-4">
            <label for="password_confirmation">COnfirmar contraseña</label>
            <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                required autocomplete="new-password" />
            @error('password_confirmation')
                <div class="mt-2 text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-800">
                Restaurar contraseña
            </button>
        </div>
    </form>
@endsection

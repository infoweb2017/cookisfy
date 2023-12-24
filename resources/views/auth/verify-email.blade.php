@extends('layouts.app')

@section('content')
    <h2>Verificar Correo Electrónico</h2>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Gracias por registrarte. Antes de empezar, ¿podrías verificar tu dirección de correo electrónico haciendo clic en el
        enlace que te acabamos de enviar? Si no lo has recibido, estaremos encantados de enviarte otro.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante el
            registro.
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-800">
                    Reenviar el correo de verificación
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                Cerrar sesión
            </button>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Restablecer Contraseña Olvidada') }}</div>

                    <div class="card-body">
                        <p class="text-sm text-gray-600 mb-4">
                            ¿Olvidaste tu contraseña? No te preocupes. Proporciona tu dirección de correo electrónico y te
                            enviaremos un enlace para restablecer la contraseña y elegir una nueva.
                        </p>

                        <!-- Estado de la sesión -->
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Dirección de correo electrónico -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('E-mail') }}</label>
                                <input id="email" class="form-control" type="email" name="email"
                                    value="{{ old('email') }}" required autofocus />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-primary">{{ __('Enviar') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

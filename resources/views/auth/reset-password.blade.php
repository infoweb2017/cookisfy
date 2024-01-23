@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Restablecer Contraseña') }}</div>

                    <div class="card-body mb-10">
                        <form method="PUT" action="{{ route('password.update') }}">
                            @csrf

                            <!-- Token de restablecimiento de contraseña -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Correo electrónico -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" class="form-control" type="email" name="email"
                                    value="{{ old('email', $request->email) }}" required autocomplete="username" />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Contraseña -->
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                                <input id="password" class="form-control" type="password" name="password" required
                                    autocomplete="new-password" />
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirmar contraseña -->
                            <div class="mb-3">
                                <label for="password_confirmation"
                                    class="form-label">{{ __('Confirmar Contraseña') }}</label>
                                <input id="password_confirmation" class="form-control" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">{{ __('Restaurar Contraseña') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<section>
    <div class="container">
        <div class="row-cols-auto">
            <div class="col-lg-9">
                <h2 class="text-lg-center">
                    Información de perfil
                </h2>
                @if (auth()->user()->imagen_perfil)
                    <img class="rounded-circle" src="{{ asset(Storage::url(auth()->user()->imagen_perfil)) }}"
                        alt="Foto de perfil" height="46">
                @else
                    <p>No hay foto de perfil</p>
                @endif
                @if ($errors->has('imagen_perfil'))
                    <div class="alert alert-danger">
                        {{ $errors->first('imagen_perfil') }}
                    </div>
                @endif
                <p class="mt-2 text-sm">
                    Actualice la información de perfil y la dirección de correo electrónico de su cuenta.
                </p>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input id="name" name="name" type="text" class="form-control"
                            value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                        @if ($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input id="email" name="email" type="email" class="form-control"
                            value="{{ old('email', $user->email) }}" required autocomplete="username" />
                        @if ($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div class="mt-2">
                                <p class="text-sm text-gray-800">
                                    Su dirección de correo electrónico no está verificada.
                                    <button form="send-verification" class="btn btn-link">Haga clic aquí para volver a
                                        enviar el correo electrónico de verificación.</button>
                                </p>
                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 text-success">
                                        Se ha enviado un nuevo enlace de verificación a su dirección de correo
                                        electrónico.
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>
                    <!--<div class="mt-4 mb-4">
                        <label for="foto_perfil" class="form-label">Foto de perfil</label>
                        <input type="file" id="foto_perfil" name="foto_perfil" accept="image/" class="form-control">
                    </div>-->
                    <!-- Campo para subir imagen -->
                    <div class="mt-4 mb-4">
                        <label for="imagen_perfil" class="form-label">Foto de perfil</label>
                        <input type="file" class="form-control" id="imagen_perfil" name="imagen_perfil"
                            accept="images/img_usuario*">
                    </div>

                    <div class="d-flex align-items-center gap-4">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        @if (session('status') === 'profile-updated')
                            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 1000)"
                                class="alert alert-success" role="alert">
                                Perfil actualizado con éxito.
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

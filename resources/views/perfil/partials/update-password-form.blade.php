<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <p class="mt-2 btn">
                Asegúrese de que su cuenta utiliza una contraseña larga y aleatoria para mantener la seguridad.
            </p>

            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-2">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="current_password" class="form-label btn">Contraseña actual</label>
                    <input id="current_password" name="current_password" type="password" class="form-control"
                        autocomplete="current-password" />
                    @error('current_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label btn">Nueva contraseña</label>
                    <input id="password" name="password" type="password" class="form-control"
                        autocomplete="new-password" />
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label btn">Confirmar contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control"
                        autocomplete="new-password" />
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex align-items-center gap-4">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    @if (session('status') === 'password-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm">
                            Contraseña actualizada correctamente.</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

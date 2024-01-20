<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Eliminar cuenta
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Una vez eliminada su cuenta, todos sus recursos y datos se borrarán permanentemente. Antes de eliminar su cuenta, descargue los datos o la información que desee conservar.
        </p>
    </header>

    <button class="btn btn-danger"
        onclick="document.getElementById('confirm-user-deletion-modal').classList.add('show')"
    >Eliminar cuenta</button>

    <div class="modal fade" id="confirm-user-deletion-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900">
                        ¿Seguro que quieres eliminar tu cuenta?
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Una vez eliminada su cuenta, todos sus recursos y datos se borrarán permanentemente. Introduzca su contraseña para confirmar que desea eliminar definitivamente su cuenta.
                    </p>

                    <div class="mt-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="form-control"
                            placeholder="Contraseña"
                        />
                        @if($errors->userDeletion->has('password'))
                            <div class="text-danger">{{ $errors->userDeletion->first('password') }}</div>
                        @endif
                    </div>

                    <div class="mt-4 text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger ms-2">Eliminar cuenta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Inicializar los modales de Bootstrap
            $('[data-toggle="modal"]').modal();
        });
    </script>
</section>

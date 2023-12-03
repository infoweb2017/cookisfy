<form action="{{ route('recetas.buscarAvanzada') }}" method="GET">

    {{-- Campos de búsqueda avanzada  --}}
    <div class="form-group">
        <label for="ingredientes">Ingredientes:</label>
        <input type="text" name="ingredientes" id="ingredientes" class="form-control">
    </div>
    <div class="form-group">
        <label for="categoria">Categoría:</label>
        <select name="categoria" id="categoria" class="form-control">
            <option value="">Selecciona una categoría</option>
            {{-- Opciones de categoría obtenidas de la base de datos --}}
            @foreach ($categorias as $categoria)
                {{-- Opcion --}}
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
    </div>
    {{-- Otros campos de búsqueda avanzada --}}

    {{-- Botón de búsqueda --}}
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>

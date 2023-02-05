<h2>Editando la nota {{ $note->id }}</h2>
@if (session('mensaje'))
    <div class="alert alert-
success">{{ session('mensaje') }}</div>
@endif
<form action="{{ route('notes.edit', $note->id) }}" method="POST"> @method('PUT') {{-- Necesitamos cambiar al método PUT para editar --}}
    @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}} @error('nombre')
        <div class="alert alert-danger"> El nombre es obligatorio </div>
        @enderror @error('descripcion')
        <div class="alert alert-danger"> La descripción es obligatoria </div>
    @enderror <input type="text" name="nombre" class="form-control mb-2" value="{{ $note->nombre }}"
        placeholder="Nombre 
de la nota" autofocus> <input type="text" name="descripcion"
        placeholder="Descripción de la 
nota" class="form-control mb-2" value="{{ $note->descripcion }}"> <button
        class="btn btn-
primary btn-block" type="submit">Guardar cambios</button>
</form>

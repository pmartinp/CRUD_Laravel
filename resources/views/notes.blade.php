<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

</head>

<body>
    <h1>Notas desde base de datos</h1>
    <div class="table-responsive">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Detalles</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notes as $note)
                <tr>
                    <td>{{ $note->nombre }}</td>
                    <td>{{ $note->descripcion }}</td>
                    <td><a href="{{ '/notes/'.$note->id }}"><i class="bi bi-clipboard"></i></a></td>
                    <td><a href="{{ '/notes/edit/'.$note->id }}"><i class="bi bi-pencil"></i></a></td>
                    <td>
                        <form action="{{ route('notes.delete', $note) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn" type="submit"><i class="bi bi-trash3 text-danger"></i></button>
                            </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif

    <form action="{{ route('notes.create') }}" method="POST">
        @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}

        @error('nombre')
            <div class="alert alert-danger">No olvides rellenar el nombre</div>
        @enderror
        @error('descripcion')
            <div class="alert alert-danger">No olvides rellenar la descripción</div>
        @enderror
            
        <input type="text" name="nombre" placeholder="Nombre de la nota" class="form-control mb-2" autofocus>
        <input type="text" name="descripcion" placeholder="Descripción de la nota" class="form-control mb-2">
        <button class="btn btn-primary btn-block" type="submit">
            Crear nueva nota
        </button>
    </form>

</body>

</html>

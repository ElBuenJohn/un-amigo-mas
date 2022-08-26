Mostrar la lista de mascotas

@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}
    
@endif

<a href="{{ url('mascota/create') }}">Crear nueva mascota</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Raza</th>
            <th>Tamaño</th>
            <th>Acciones</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($mascotas as $mascota)
        <tr>
            <td>{{ $mascota->id }}</td>
            <td>
            <img src="{{ asset('storage').'/'.$mascota->Foto }}" width="250" alt="">
            </td>
            <td>{{ $mascota->NombreM }}</td>
            <td>{{ $mascota->Descripcion }}</td>
            <td>{{ $mascota->Edad }}</td>
            <td>{{ $mascota->Sexo }}</td>
            <td>{{ $mascota->Raza }}</td>
            <td>{{ $mascota->Tamanio }}</td>
            <td> 
                
            <a href="{{ url('/mascota/'.$mascota->id.'/edit') }}">
                Editar
            </a>    
                 | 
            
            <form action="{{ url('/mascota/'.$mascota->id ) }}" method="post">
            @csrf
            {{ @method_field('DELETE') }}
            <input type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
            
            </form>
            
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
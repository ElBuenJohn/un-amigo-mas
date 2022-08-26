Formulario de creacion de mascotas

<form action="{{ url('/mascota') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('mascota.form',['modo'=>'Crear'])


</form>
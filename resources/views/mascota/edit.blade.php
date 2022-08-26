formulario de edicion de mascotas
    <form action="{{ url('/mascota/'.$mascota->id ) }}"  method="post" enctype="multipart/form-data" >
    @csrf
    {{ method_field('PATCH') }}

    @include('mascota.form',['modo'=>'Editar']);
    </form>
   
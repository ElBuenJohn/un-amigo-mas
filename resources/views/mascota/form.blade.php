<h1>{{ $modo }} Mascota</h1>

<label for="NombreM">Nombre </label>
<input type="text" name="NombreM" value="{{ isset ($mascota->NombreM)?$mascota->NombreM:'' }}" id="NombreM">
<br>

<label for="Edad">Edad</label>
<input type="Edad" name="Edad" value="{{ isset ($mascota->Edad)?$mascota->Edad:'' }}" id="Edad">
<br>

<label for="Sexo">Sexo</label>
<input type="text" name="Sexo" value="{{ isset ($mascota->Sexo)?$mascota->Sexo:'' }}" id="Sexo">
<br>

<label for="Descripcion">Descripcion </label>
<input type="text" name="Descripcion"value="{{ isset($mascota->Descripcion)?$mascota->Descripcion:'' }}" id="Descripcion">
<br>

<label for="Raza">Raza</label>
<input type="text" name="Raza" value="{{ isset($mascota->Raza)?$mascota->Raza:'' }} "id="Raza">
<br>

<label for="Tamanio">Tamaño</label>
<input type="text" name="Tamanio" value="{{ isset($mascota->Tamanio)?$mascota->Tamanio:'' }}" id="Tamanio">
<br>

<label for="Foto">Foto de Mascota</label>
@if (isset($mascota->Foto))
<img src="{{ asset('storage').'/'.$mascota->Foto }}" width="100"  alt="">
@endif
<input type="file" name="Foto" value="" id="Foto">
<br>

<input type="submit" value="{{ $modo }} datos">
<a href="{{ url('mascota/') }}">Regresar</a>

<br>
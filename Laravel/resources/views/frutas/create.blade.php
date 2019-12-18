@if (isset($fruta) && is_object($fruta))
<h1>Editar la fruta</h1>
@else
<h1>Crear una fruta</h1>
@endif
<form action="{{ isset($fruta) ? action('FrutaController@update', ['id' => $fruta->idfrutas]) : action('FrutaController@save') }}" method="POST">
    {{ csrf_field() }}
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" value="{{ $fruta->nombre ?? '' }}" required>
    <br>
    <label for="description">Descripción</label>
    <textarea name="description" id="description" required>{{ $fruta->descripcion ?? '' }}</textarea>
    <br>
    <label for="price">Precio</label>
    <input type="text" name="price" id="price" pattern="[0-9.]+" value="{{ $fruta->precio ?? '' }}" required>
    <br>
    <input type="submit" value="enviar">
</form>

<h2>Formulario en Laravel</h2>
<form action="{{ action('PeliculaController@recibir') }}" method="POST" autocomplete="off">
    {{ csrf_field() }}
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre">
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <br>
    <input type="submit" value="enviar">
</form>
<a href="{{ action('PeliculaController@index') }}">Inicio</a>

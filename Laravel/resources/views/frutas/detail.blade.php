<style>
    body{
        font-family: sans-serif;
    }
    .status.edit{
        color: greenyellow;
    }
</style>
<h2>{{ $fruta->nombre }} - {{ $fruta->precio }}</h2>
@if (session('status[edit]'))
    <p class="status edit">{{ session('status[edit]') }}</p>
@endif
<p>{{ $fruta->descripcion }}</p>
<a href="{{ action('FrutaController@delete', ['id' => $fruta->idfrutas]) }}">Borrar fruta</a>
<br>
<a href="{{ action('FrutaController@edit', ['id' => $fruta->idfrutas]) }}">Editar fruta</a>
<br>
<a href="{{ action('FrutaController@index') }}">Volver</a>

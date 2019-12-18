<h1> {{ $titulo }} </h1>
<p>Pagina: {{$pagina}} </p>
<p>Acción index del controlador PeliculaController.</p>
<a href="{{ route('detalle.pelicula', ['year' => 2019]) }}">Ir al detalle</a>
<br>
<a href="{{ action('PeliculaController@redirigir') }}">redirigir</a>
<br>
<a href="{{ action('PeliculaController@formulario') }}">Formulario</a>

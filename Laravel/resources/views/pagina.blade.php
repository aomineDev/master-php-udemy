@extends ('layouts.master')

@section('title', 'Laravel')

@section('header')
    @parent()
    <p>Hola</p>
@endsection

@section('content')
<p>Contenido de la página</p>
@endsection

@section('footer')
    <h2>FOOTER DE LA PAGINA</h2>
@endsection

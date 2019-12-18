<style>
    body {
       font-family: sans-serif
   }
   .status.create{
       color: green;
   }
   .status.delete{
       color: red;
   }
   </style>
   <h1>Listado de frutas</h1>
   @if (session('status[create]'))
       <p class="status create">{{session('status[create]')}}</p>
   @elseif (session('status[delete]'))
       <p class="status delete">{{session('status[delete]')}}</p>
   @endif
   <ul>
   @foreach ($frutas as $fruta)
   <li><a href="{{ action('FrutaController@detail', ['id' => $fruta->idfrutas]) }}">{{ $fruta->nombre }}</a></li>
   @endforeach
   </ul>


   <a href="{{ action('FrutaController@create') }}">Crear</a>
   <a href="/">Inicio</a>


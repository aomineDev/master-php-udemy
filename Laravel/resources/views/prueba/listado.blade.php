<style>
    body {
        font-family: sans-serif;
    }
    </style>

    @include('includes.header')

    {{-- Imprimir por pantalla --}}
    <h1>{{ $titulo }}</h1>
    <ul>
    <li>{{ $listado[0]}} - {{ date('Y') }}</li>
    </ul>

    {{-- ISSET --}}
    <h2>Isset</h2>
    {{ $director ?? 'No hay ningun director' }}

    {{-- CONDICIONALES --}}
    <h2>Condicionales</h2>
    @if ($titulo && count($listado) >= 5)
    <p>El tirulo existe y el listado es mayor a 5</p>
    @elseif ($titulo)
    <p>El titulo existe pero el listado no es mayor a 5</p>
    @else
    <p>El titulo no existe</p>
    @endif

    {{-- BUCLES --}}
    <h2>Bucles</h2>
    <h3>For</h3>
    @for($i = 1; $i <= 10; $i++)
    <p>Bucle {{ $i }} </p>
    @endfor

    <h3>While</h3>
    @php
        $count = 1;
    @endphp
    @while ($count <= 20)
    @if ($count % 2 == 0)
        <p>{{ $count }} es un número par</p>
    @endif
    @php
        $count++
    @endphp
    @endwhile

    <h3>For Each</h3>
    @foreach ($listado as $index => $item)
    <li>{{ $item }}</li>
    @endforeach

    @include('includes.footer')

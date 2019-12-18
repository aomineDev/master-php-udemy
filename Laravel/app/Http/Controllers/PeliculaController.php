<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculaController extends Controller {
    public function index($pagina = 1){
        $titulo = 'listado de mis peliculas';
        return view('pelicula.index', [
            'titulo' => $titulo,
            'pagina' => $pagina
        ]);
    }

    public function detalle($year = null){
        return view('pelicula.detalle', [
            'year' => $year
        ]);
    }

    public function redirigir(){
        // return redirect()->action('PeliculaController@detalle');
        // return redirect()->route('detalle.pelicula');
        return redirect('/pelicula');
    }

    public function formulario(){
        return view('pelicula.formulario');
    }

    public function recibir(Request $request){
        $nombre = $request->input('nombre');
        $email = $request->input('email');

        return "El nombre es $nombre y su email $email";
    }
}

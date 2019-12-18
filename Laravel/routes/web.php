<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Frutas
Route::group(['prefix' => 'frutas'], function(){
    Route::get('/', 'FrutaController@index');
    Route::get('detail/{id}', 'FrutaController@detail');
    Route::get('create', 'FrutaController@create');
    Route::post('save', 'FrutaController@save');
    Route::get('delete/{id}', 'FrutaController@delete');
    Route::get('edit/{id}', 'FrutaController@edit');
    Route::post('update/{id}', 'FrutaController@update');
});

//  Controllers
Route::get('/pelicula/{pagina?}', 'PeliculaController@index');

Route::get('/detalle/{year?}', [
    'middleware' => 'testyear',
    'uses' => 'PeliculaController@detalle',
    'as' => 'detalle.pelicula'
]);

Route::get('/redirigir', 'PeliculaController@redirigir');

Route::get('/formulario', 'PeliculaController@formulario');

Route::post('/recibir', 'PeliculaController@recibir');

//  Resource
Route::resource('usuario', 'UsuarioController');

// Pruebas
Route::get('/mostrar-fecha', function(){
    $titulo = 'Estoy mostrando la vista';
return view('mostrar-fecha', [
    'titulo' => $titulo
    ]);
});

Route::get('/prueba/{titulo}/{year?}', function($titulo, $year = 2019){
    return view('pelicula', [
        'titulo' => $titulo,
        'year' => $year
    ]);
})->where([
    'titulo' => '[a-zA-Z]+',
    'year' => '[0-9]+'
]);

Route::get('/listado', function(){
    $titulo = 'Claro p mascota';
    $listado = ['Batman', 'SpiderMan', 'Gran Torino'];
    return view('prueba.listado')
    ->with('titulo', $titulo)
    ->with('listado', $listado);
});

Route::get('/pagina', function(){
 return view('pagina');
});

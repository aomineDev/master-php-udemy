<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrutaController extends Controller{
    public function index(){
        $frutas = DB::table('frutas')
        ->orderBy('idfrutas', 'desc')
        ->get();
        return view('frutas.index', [
            'frutas' => $frutas
        ]);
    }

    public function detail($id){
        $fruta = DB::table('frutas')->where('idfrutas', '=', $id)->first();
        return view('frutas.detail', [
            'fruta' => $fruta
        ]);
    }

    public function create(){
        return view('frutas.create');
    }

    public function save(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');

        $fruta = DB::table('frutas')->insert([
            'nombre' => $name,
            'descripcion' => $description,
            'precio' => $price,
            'fecha' => Date('Y-m-d')
        ]);
        return redirect()->action('FrutaController@index')->with('status[create]', 'Fruta creada correctamente');
    }

    public function delete($id){
        $fruta = DB::table('frutas')->where('idfrutas', $id)->delete();
        return redirect()->action('FrutaController@index')->with('status[delete]', 'Fruta borrada correctamente');
    }

    public function edit($id){
        $fruta = DB::table('frutas')->where('idfrutas', $id)->first();
        return view ('frutas.create', [
            'fruta' => $fruta
        ]);
    }

    public function update($id, Request $request){
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $fruta = DB::table('frutas')->where('idfrutas', $id)->update([
            'nombre' => $name,
            'descripcion' => $description,
            'precio' => $price
        ]);
        return redirect()->action('FrutaController@detail', ['id' => $id])->with('status[edit]', 'Fruta editada correctamente');
    }
}

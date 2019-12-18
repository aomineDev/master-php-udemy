<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Image;
use App\User;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function perfil($nick) {
        $user = User::where('nick', $nick)->first();
        $images = Image::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('user.perfil', [
            'images' => $images,
            'user' => $user
        ]);
    }

    public function config() {
        return view('user.config');
    }

    public function update(Request $request) {
        // Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        // Validación del formulario
        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', "unique:users,nick,$id"],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,$id"],
            'image_path' => ['image']
        ]);

        // Recoge datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        // Asignar nuevos valores al objeto del usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        // Subir imagen
        $image_path = $request->file('image_path');
        if($image_path){
            if($user->image != 'default.jpg'){
            // Eliminar ficheros de imagenes
            Storage::disk('users')->delete($user->image);
            }

            // Poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();

            // Guardar en la carpeta storage (storage/app/users)
            Storage::disk('users')->put($image_path_name, File::get($image_path));

            // TinyCompresor
            $filepath = public_path('../storage/app/users/' . $image_path_name);
            \Tinify\setKey("pnAXHzekn7rZuJTVzFQDqrZuDrTLwez8");
            $source = \Tinify\fromFile($filepath);
            $source->toFile("../storage/app/users/".$image_path_name);

            // Guardamos el  nombre de la imagen en el objeto user
            $user->image = $image_path_name;
        }

        // Ejecutar consulta y cambios en la base de datos
        $user->update();

        // Devolver una session flash
        return redirect()->route('user_config')->with(['message' => 'updated success']);
    }

    public function getImage($file_name){
        $file = Storage::disk('users')->get($file_name);
        return new Response($file, 200);
    }

    public function users($search = null){
        if(empty($search)) {
            $title = null;
            $users = User::orderBy('nick')->get();
        }else {
            $title = "Resultados de $search";
            $users = User::where('nick', 'LIKE', '%'. $search . '%')
            ->orWhere('name', 'LIKE', '%'. $search . '%')
            ->orWhere('surname', 'LIKE', '%'. $search . '%')
            ->orderBy('nick')->get();
        }
        return view('user.users', [
            'title' => $title,
            'users' => $users
        ]);
    }

    public function formChangePassword(){
        return view('user.formChangePassword');
    }

    public function changePassword(Request $request){
        $validate = $this->validate($request, [
            'oldPassword' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $oldPassword = $request->input('oldPassword');
        $password = $request->input('password');
        $password = Hash::make($password);
        $user = \Auth::user();

        $checkPassword = Hash::check($oldPassword, $user->password);
        if($checkPassword){
            $user->password = $password;
            $user->update();
            return redirect()->route('user_perfil', ['nick' => $user->nick])->with(['message' => 'password successfully changed']);
        }else {
            return redirect()->route('formChangePassword')->with(['messageError' => 'there was an error when changing the password']);
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Image;


class CommentController extends Controller{
    public function __construct() {
        $this->middleware('auth');
    }

    public function save(Request $request){
        // Validación
        $validate = $this->validate($request, [
            'image_id' => ['integer','required'],
            'content' => ['string', 'required']
        ]);

        // Recogiendo Datos
        $user = \Auth::user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        // Asigno los valores a mi nuevo objeto
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        // Guardar en la bd
        $comment->save();

        // Redireccion
        return response()->json([
            'content' => $content,
            'image_id' => $image_id,
            'message' => 'comentario realizado exitosamente'
        ]);
    }

    public function delete($id) {
        // Conseguir datos del usuario identificado
        $user = \Auth::user();

        // Conseguir objeto del comentario
        $comment = Comment::find($id);
        $image = Image::find($id);

        // Comprobar si soy el dueño del comentario o de la publicación
        if($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)){
            $comment->delete();
        }

        return response()->json([
            'message' => 'comentario eliminado'
        ]);

    }
}

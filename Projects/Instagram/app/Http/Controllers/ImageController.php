<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Image;
use App\Comment;
use App\Like;

class ImageController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function upload(){
        return view('image.upload');
    }

    public function save(Request $request){
        // Validation
        $validate = $this->validate($request, [
            'description' => ['required'],
            'image_path' => ['required','image']
        ]);

        // Recogiendo datos
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        // Asignar valores al objeto
        $user = \Auth::user();
        $id = $user->id;
        $image = new Image();
        $image->user_id = $id;
        $image->description = $description;

        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));

            // TinyCompresor
            $filepath = public_path('../storage/app/images/' . $image_path_name);
            \Tinify\setKey("pnAXHzekn7rZuJTVzFQDqrZuDrTLwez8");
            $source = \Tinify\fromFile($filepath);
            $source->toFile("../storage/app/images/".$image_path_name);

            $image->image_path = $image_path_name;
        }

        $image->save();

        return redirect()->route('home')->with(['message' => 'Your image has been successfully uploaded']);
    }

    public function getImage($file_name) {
        $file = Storage::disk('images')->get($file_name);
        return new Response($file, 200);
    }

    public function detail($id) {
        $image = Image::find($id);
        return view('image.detail', [
            'image' => $image
        ]);
    }

    public function detailJson($id){
        $images = Image::all();
        $users = [];
        foreach($images as $image){
            array_push($users, $image->user);
        };
        return $images;
    }

    public function delete($id){
        $user = \Auth::user();
        $image = Image::find($id);
        $comments = Comment::where('image_id', $id)->get();
        $likes = Like::where('image_id', $id)->get();

        if($image && $user->id == $image->user->id){
            // Eliminar los comentarios
            if($comments && count($comments) > 0){
                foreach($comments as $comment){
                    $comment->delete();
                }
            }

            // Eliminar los likes
            if($likes && count($likes) > 0){
                foreach($likes as $like){
                    $like->delete();
                }
            }

            // Eliminar ficheros de imagenes
            Storage::disk('images')->delete($image->image_path);

            // Eliminar registro de la imagen
            $image->delete();

            // Redirreccion
            $message = ['message' => 'The image was successfully deleted'];
        }else {
            $message = ['messageError' => 'There was an error while trying to delete the image'];
        }

        return redirect()->route('home')->with($message);
    }

    public function edit($id){
        $user =\Auth::user();
        $image = Image::find($id);

        if($image && $user->id == $image->user->id){
            return view('image.upload', [
                'image' => $image
            ]);
        }else {
            return redirect()->route('image_detail', ['id' => $id]);
        }
    }

    public function update($id, Request $request){

        // Validation
        $validate = $this->validate($request, [
            'description' => ['required'],
            'image_path' => ['image']
        ]);

        // Recogiendo datos
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        $user = \Auth::user();
        $image = Image::find($id);
        $image->description = $description;

        if($image->user->id == $user->id){
            if($image_path){
                // Eliminar ficheros de imagenes
                Storage::disk('images')->delete($image->image_path);

                $image_path_name = time().$image_path->getClientOriginalName();
                Storage::disk('images')->put($image_path_name, File::get($image_path));

                // TinyCompresor
                $filepath = public_path('../storage/app/images/' . $image_path_name);
                \Tinify\setKey("pnAXHzekn7rZuJTVzFQDqrZuDrTLwez8");
                $source = \Tinify\fromFile($filepath);
                $source->toFile("../storage/app/images/".$image_path_name);

                $image->image_path = $image_path_name;
            }

            $image->update();

            return redirect()->route('image_detail', ['id' => $id])->with(['message' => 'The image was successfully updated']);
        }

        return redirect()->route('image_edit', ['id' => $id])->with(['messageError' => 'There was an error while trying to update the image']);
    }
}

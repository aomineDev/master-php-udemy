<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller{
    public function __construct() {
        $this->middleware('auth');
    }

    public function like($image_id){
        $user = \Auth::user();

        // Condicion para ver si ya existe el like
        $issetLike = Like::where('user_id', $user->id)->where('image_id', $image_id)->count();

        if ($issetLike == 0) {
            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = (int)$image_id;

            $like->save();

            return response()->json([
                'like' => $like
            ]);
        }else {
            return response()->json([
                'message' => 'El like existe'
            ]);
        }

    }

    public function dislike($image_id){
        $user = \Auth::user();

        // Condicion para ver si ya existe el like
        $like = Like::where('user_id', $user->id)->where('image_id', $image_id)->first();

        if ($like) {
            $like->delete();

            return response()->json([
                'like' => $like,
                'message' => 'Has dado dislike'
            ]);
        }else {
            return response()->json([
                'message' => 'El like no existe'
            ]);
        }
    }

    public function favorites(){
        $user = \Auth::user();

        $favorites = Like::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(5);

        return view('favorites.favorites', [
            'favorites' => $favorites
        ]);
    }

}

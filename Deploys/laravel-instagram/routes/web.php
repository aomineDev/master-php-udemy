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

use App\Image;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// User
Route::get('/user/config', 'UserController@config')->name('user_config');
Route::get('/user/perfil/{nick}', 'UserController@perfil')->name('user_perfil');
Route::post('/user/update', 'UserController@update')->name('user_update');
Route::get('/user/avatar/{file_name}', 'UserController@getImage')->name('user_avatar');
Route::get('/users/{search?}', 'UserController@users')->name('users');
Route::get('/user/formChangePassword', 'UserController@formChangePassword')->name('formChangePassword');
Route::post('/user/changePassword', 'UserController@changePassword')->name('changePassword');

// Image
Route::get('/image/upload', 'ImageController@upload')->name('image_upload');
Route::post('/image/save', 'ImageController@save')->name('image_save');
Route::get('/image/delete/{id}', 'ImageController@delete')->name('image_delete');
Route::get('/image/edit/{id}', 'ImageController@edit')->name('image_edit');
Route::post('/image/update/{id}', 'ImageController@update')->name('image_update');
Route::get('/image/{file_name}', 'ImageController@getImage')->name('image_get');
Route::get('/image/detail/{id}', 'ImageController@detail')->name('image_detail');
Route::post('/comment/save', 'CommentController@save')->name('comment_save');
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment_delete');
Route::get('/like/{image_id}', 'LikeController@like')->name('like');
Route::get('/dislike/{image_id}', 'LikeController@dislike')->name('dislike');

// Likes
Route::get('/favorites', 'LikeController@favorites')->name('favorites');






















/* Route::get('/', function () {
    $images = Image::all();
    foreach($images as $image){
        echo "<p><strong>{$image->user->name} {$image->user->surname}</strong><br>".
        "{$image->image_path}<br>".
        "{$image->description}<br>".
        "Likes: " . count($image->likes) . "</p>";
        if (count($image->comments) > 0) {
            foreach($image->comments as $comment){
                echo "<p>Comentarios</p>".
                "<p>{$comment->user->name} {$comment->user->surname}: {$comment->content}</p>";
            }
        }
    }

    die();

}); */

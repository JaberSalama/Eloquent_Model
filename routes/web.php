<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

// Route::get('posts/create', function () {
//     return view('posts/create');
// });




Route::resource('posts' , PostController::class ); 
Route::get('posts/restore/{id}',[PostController::class , 'restore'])->name('posts.restore');
Route::get('posts/Forcedelete/{id}',[PostController::class , 'ForceDelete'])->name('posts.delete');



// Route::get('posts/create' , [PostController::class , 'store']) ; 
// Route::get('posts/edit/{id}' , [PostController::class , 'edit']) ; 


// Route::controller(PostController::class)->group(function(){
//     //  Route::resources('posts' , 'index'); 
//     Route::get('posts' , 'index')->name('posts') ; 
//    Route::get('posts/create' , 'create') ; 
//    Route::post('posts/insert' , 'insert')->name('posts.insert') ; 
//    Route::post('posts/store' , 'store')->name('posts.store') ; 
//    Route::get('posts/{id}/edit' ,   'edit')->name('posts.edit') ; 
//    Route::put('posts/update/{id}' , 'update')->name('posts.update') ; 
   
   
//    });




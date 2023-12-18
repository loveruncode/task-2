<?php

use App\Http\Controllers\blogController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/// view

Route::get('/', function () {
    return view('Blog.login');
})->name('login');

Route::get('/rester', function () {
    return view('Blog.rester');
})->name('Register');



Route::get('/homepage', function(){


    return view('Blog.home');
})->name('homepage');

Route::get('/addblog', function () {

    return view('Blog.addblog');
});







Route::get('/update', function () {

    return view('Blog.update');
})->name('update');


///
Route::middleware(['register'])->group(function () {

    Route::post('/regis', [userController::class, 'kiemtra']);
});







Route::post('/', [userController::class, 'login']);


Route::post('/addBlog', [blogController::class, 'insertBlog']);


Route::get('/homepage', [blogController::class, 'getValue']);


Route::get('/delete/{id}', [blogController::class, 'delete']);

Route::get('/update', [blogController::class, 'getvalueUpdate']);


Route::post('/updateblog/{id}', [blogController::class, 'update']);


Route::post('/delete-selected', [blogController::class, 'deleteId']);

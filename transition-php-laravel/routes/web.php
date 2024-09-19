<?php

use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoControleur;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PingPongControleur;
use App\Http\Controllers\TestFlashController;
use App\Http\Controllers\AuthentificationControleur;


Route::get('/', function () {
    return view('welcome', ['titre' => 'Mon premier exemple.']);
});
Route::get('/ping', [PingPongControleur::class, 'ping']);

Route::get('/pong', [PingPongControleur::class, 'pong']);
Route::get('/flash', [TestFlashController::class, 'main']);
Route::post('/traitement', [TestFlashController::class, 'traitement']);
Route::middleware('throttle:50,1')->get('/todolist', [TodoControleur::class, 'todolist'])->middleware(CheckAuth::class);
Route::middleware('throttle:10,1')->post('/addtodo', [TodoControleur::class, 'addtodo'])->middleware(CheckAuth::class);
Route::get('/todo/terminer/{id}', [TodoControleur::class, 'mark'])->middleware(CheckAuth::class);
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/connexion', [AuthentificationControleur::class, 'loginview']);
Route::post('/traitementLogin', [AuthentificationControleur::class, 'traitementLogin']);
Route::get('/register', [AuthentificationControleur::class, 'registerView']);
Route::post('/traitementRegister', [AuthentificationControleur::class, 'traitementRegister']);
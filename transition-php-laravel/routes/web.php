<?php

use App\Http\Controllers\AuthentificationControleur;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoControleur;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PingPongControleur;
use App\Http\Controllers\TestFlashController;


Route::get('/', function () {
    return view('welcome', ['titre' => 'Mon premier exemple.']);
});
Route::get('/ping', [PingPongControleur::class, 'ping']);

Route::get('/pong', [PingPongControleur::class, 'pong']);
Route::get('/flash', [TestFlashController::class, 'main']);
Route::post('/traitement', [TestFlashController::class, 'traitement']);
Route::get('/todolist', [TodoControleur::class, 'todolist']);
Route::post('/addtodo', [TodoControleur::class, 'addtodo']);
Route::get('/todo/terminer/{id}', [TodoControleur::class, 'mark']);
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/connexion', [AuthentificationControleur::class, 'loginview']);
Route::post('/traitementLogin', [AuthentificationControleur::class, 'traitementLogin']);
Route::get('/register', [AuthentificationControleur::class, 'registerView']);
Route::post('/traitementRegister', [AuthentificationControleur::class, 'traitementRegister']);
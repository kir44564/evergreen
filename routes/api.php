<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Ui\Presets\React;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', function(Request $request){
    return $request->users();
});

//CRUD UTENTI
/* GET /utenti x per la lista utenti
/* GET /utenti/{id} x dettagli utenti
/* POST /utenti x craere utente
/* PUT /utenti/{id} x modifica utente
/* DELETE /utenti/{id} x eliminare l'utente */

Route::get('/utenti', [ApiController::class, 'index']);
Route::get('/utenti/{id}', [ApiController::class, 'show']);
Route::post('/utenti', [ApiController::class, 'store']);
Route::put('/utenti/{id}', [ApiController::class, 'update']);
Route::delete('/items/{id}', [ApiController::class, 'delete']);
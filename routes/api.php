<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\userController;
use App\models\user; // agregando ruta del modelo user
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!

*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', [userController::class, 'index']); //accede al metodo index en el controllador
Route::resource('users', userController::class); //establece el recurso a mostrar

Route::get('user', [userController::class, 'show']); //accede al metodo index en el controllador
Route::resource('user', userController::class); //establece el recurso a mostrar para la ruta correspondiente

Route::post('add_user', [userController::class, 'store']);//creamos el acceso para el metodo post


Route::put('mod_user/{id}', [userController::class, 'update'])->name('ingresar.datos');
Route::resource('mod_user', userController::class); //establece el recurso a mostrar para la ruta correspondiente
//Route::put('editar', [userController::class, 'update']);

Route::delete('delete_user/{id}', [userController::class, 'destroy']);




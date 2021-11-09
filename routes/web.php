<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckSession;


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
})->name("welcome");
Route::post("/cadastrarCliente","App\\Http\\Controllers\\clienteController@store")->name("cadastroCliente")->middleware(CheckSession::class);;

Route::get("novoCliente","App\\Http\\Controllers\\clienteController@create")->name("novoCliente")->middleware(CheckSession::class);;

Route::get("listarClientes","App\\Http\\Controllers\\clienteController@index")->name("listarCliente")->middleware(CheckSession::class);

Route::post("/editarCliente","App\\Http\\Controllers\\clienteController@edit")->name("editarCliente")->middleware(CheckSession::class);

Route::post("/salvarCliente","App\\Http\\Controllers\\clienteController@update")->name("salvarCliente")->middleware(CheckSession::class);

Route::post("/deletarCliente","App\\Http\\Controllers\\clienteController@destroy")->name("deletarCliente")->middleware(CheckSession::class);

Route::get("novoUsuario","App\\Http\\Controllers\\usuarioController@create")->name("novoUsuario");

Route::post("/cadastrarUsuario","App\\Http\\Controllers\\usuarioController@store")->name("cadastroUsuario");

Route::post("/login","App\\Http\\Controllers\\usuarioController@login")->name("login");

Route::get('/sair', "App\\Http\\Controllers\\usuarioController@sair")->name("sair")->middleware(CheckSession::class);

Route::get("/perfil","App\\Http\\Controllers\\usuarioController@edit")->name("perfil")->middleware(CheckSession::class);

Route::post("/editarUsuario","App\\Http\\Controllers\\usuarioController@update")->name("editarUsuario")->middleware(CheckSession::class);

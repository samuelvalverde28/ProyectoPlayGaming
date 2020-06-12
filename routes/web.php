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

//Main Page
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Page home with functions
Route::get('/home', 'HomeController@index')->name('home');
Route::post('modificarImagenProfile', 'HomeController@modificarImagenProfile')->name('modificarImagenProfile');

//Page all Games with functions
Route::get('/all','HomeController@all')->name('all');
Route::post('/all/fetch','HomeController@fetch')->name('all.fetch');
Route::get('guardar/{id}','HomeController@guardar')->name('guardar');
Route::get('borrar/{id}','HomeController@borrar')->name('borrar');
Route::get('/cancelar', function(){
    return redirect()->route('all')->with('cancelar', 'Accion cancelada');
})->name('cancelar');

// Catalog
Route::get('catalogo', 'HomeController@catalogo')->name('catalogo');
Route::get('catalogo/jugando', 'HomeController@jugando')->name('jugando');
Route::get('catalogo/completado', 'HomeController@completado')->name('completado');
Route::get('catalogo/espera', 'HomeController@espera')->name('espera');
Route::get('catalogo/dejado', 'HomeController@dejado')->name('dejado');
Route::post('actualizarEstado/{id}', 'HomeController@actualizarEstado')->name('actualizarEstado');
Route::get('/cancelarModalCatalogo', function(){
    return redirect()->route('catalogo')->with('cancelar', 'Accion cancelada');
})->name('cancelarModalCatalogo');

//Configurate Users
Route::get('configUsuarios', 'HomeController@configUsuarios')->name('configUsuarios');
Route::get('borrarUsuarios/{id}', 'HomeController@borrarUsuarios')->name('borrarUsuarios');
Route::post('actualizar/actualizarUsuario/{id}', 'HomeController@actualizarUsuario')->name('actualizarUsuario');
Route::get('actualizar/{id}', 'HomeController@actualizar')->name('actualizar');
Route::post('nuevoUsuario', 'HomeController@nuevoUsuario')->name('nuevoUsuario');
Route::get('/cancelarConfigUsuario', function(){
    return redirect()->route('configUsuarios')->with('cancelar', 'Accion cancelada');
})->name('cancelarConfigUsuario');

//Configurate Games
Route::get('configJuegos', 'HomeController@configJuegos')->name('configJuegos');
Route::get('borrarJuegos/{id}', 'HomeController@borrarJuegos')->name('borrarJuegos');
Route::post('nuevoJuego', 'HomeController@nuevoJuego')->name('nuevoJuego');
Route::get('actualizarJue/{id}', 'HomeController@actualizarJue')->name('actualizarJue');
Route::post('actualizarJue/actualizarJuego/{id}', 'HomeController@actualizarJuego')->name('actualizarJuego');
Route::get('/cancelarConfigJuego', function(){
    return redirect()->route('configJuegos')->with('cancelar', 'Accion cancelada');
})->name('cancelarConfigJuego');

//Configurate Image
Route::get('/configImagenes/{id}', 'HomeController@configImagenes');
Route::get('configImagenes/borrarImagenes/{id}', 'HomeController@borrarImagenes')->name('borrarImagenes');
Route::get('nuevoImagen/{id}', 'HomeController@nuevoImagen')->name('nuevoImagen');
Route::post('nuevoImagen/agregarImagen/{id}', 'HomeController@agregarImagen')->name('agregarImagen');

// Comments games
Route::get('/comentarios/{id}', 'HomeController@comentarios')->name('comentarios');
Route::post('nuevoComentario', 'HomeController@nuevoComentario')->name('nuevoComentario');
Route::get('comentarios/borrarComentario/{id}/{idgame}', 'HomeController@borrarComentario')->name('borrarComentario');

// Follower
Route::get('/follower','HomeController@follower')->name('follower');
Route::get('guardarFollower/{id}','HomeController@guardarFollower')->name('guardarFollower');
Route::get('borrarFollower/{id}','HomeController@borrarFollower')->name('borrarFollower');

// Profile other users
Route::get('/profile/{id}','HomeController@profile')->name('profile');

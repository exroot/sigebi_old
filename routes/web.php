<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/libros', 'LibroController@index');
Route::get('/libros/crear', 'LibroController@crear');
Route::get('/libros/{libroId}', 'LibroController@mostrar');
Route::get('/libros/{libroId}/editar', 'LibroController@editar');
Route::post('/libros/{libroId}', 'LibroController@actualizar');
Route::post('/libros', 'LibroController@guardar');

Route::get('/autores', 'AutorController@index');
Route::get('/autores/crear', 'AutorController@crear');
Route::get('/autores/{autorId}', 'AutorController@mostrar');
Route::get('/autores/{autorId}/editar', 'AutorController@editar');
Route::post('/autores/{autorId}', 'AutorController@actualizar');
Route::post('/autores', 'AutorController@guardar');

Route::get('/categorias', 'CategoriaController@index');
Route::get('/categorias/crear', 'CategoriaController@crear');
Route::get('/categorias/{autorId}', 'CategoriaController@mostrar');
Route::get('/categorias/{autorId}/editar', 'CategoriaController@editar');
Route::post('/categorias/{autorId}', 'CategoriaController@actualizar');
Route::post('/categorias', 'CategoriaController@guardar');

Route::get('/copias', 'CopiaController@index');
Route::get('/copias/crear', 'CopiaController@crear');
Route::get('/copias/{autorId}', 'CopiaController@mostrar');
Route::get('/copias/{autorId}/editar', 'CopiaController@editar');
Route::post('/copias/{autorId}', 'CopiaController@actualizar');
Route::post('/copias', 'CopiaController@guardar');

Route::get('/estados', 'EstadoController@index');
Route::get('/estados/crear', 'EstadoController@crear');
Route::get('/estados/{autorId}', 'EstadoController@mostrar');
Route::get('/estados/{autorId}/editar', 'EstadoController@editar');
Route::post('/estados/{autorId}', 'EstadoController@actualizar');
Route::post('/estados', 'EstadoController@guardar');

Route::group(['prefix' => 'api'], function() {
    Route::get('/copias', 'CopiaController@getCopias');
    Route::get('/libros', 'LibroController@getLibros');
    Route::get('/autores', 'AutorController@getAutores');
    Route::get('/categorias', 'CategoriaController@getCategorias');
    Route::get('/estados', 'EstadoController@getEstados');
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'api'], function() {
        // Biblioteca
        Route::get('/prestamos/activos', 'AdminController@getPrestamosActivos');
        Route::get('/prestamos/historial', 'AdminController@getPrestamosRealizados');
        Route::get('/categorias', 'CategoriaController@getCategorias');
        Route::get('/estado', 'AdminController@getEstados');
        // Usuarios
        Route::get('/usuarios', 'AdminController@getUsuarios');
        Route::get('/roles', 'AdminController@getRoles');
        Route::get('/carreras', 'AdminController@getCarreras');
    });
    Route::get('/dashboard', 'AdminController@adminDashboard');
    Route::get('/prestamos', 'AdminController@prestamosIndex');
    
    // Usuarios - Index
    Route::get('/usuarios', 'AdminController@indexUsuarios');
    Route::get('/roles', 'AdminController@indexRoles');
    Route::get('/carreras', 'AdminController@indexCarreras');

    // Usuarios - Mostrar
    Route::get('/usuarios/{userId}', 'AdminController@mostrarUsuario');
    Route::get('/roles/{rolId}', 'AdminController@mostrarRol');
    Route::get('/carreras/{carreraId}', 'AdminController@mostrarCarrera');

    // Usuarios - Crear y guardar
    Route::get('/usuarios/crear', 'AdminController@crearUsuario');
    Route::get('/roles/crear', 'AdminController@crearRol');
    Route::get('/carreras/crear', 'AdminController@crearCarrera');
    
    Route::post('/usuarios/guardar', 'AdminController@guardarUsuario');
    Route::post('/roles/guardar', 'AdminController@guardarRol');
    Route::post('/carreras/guardar', 'AdminController@guardarCarrera');

    // Usuarios - Editar y actualizar
    Route::get('/usuarios/{userId}/editar', 'AdminController@editarUsuario');
    Route::get('/roles/{rolId}/editar', 'AdminController@editarRol');
    Route::get('/carreras/{carreraId}/editar', 'AdminController@deitarCarrera');
    Route::post('/usuarios/{userId}', 'AdminController@actualizarUsuario');
    Route::post('/roles/{rolId}', 'AdminController@actualizarRol');
    Route::post('/carreras/{carreraId}', 'AdminController@actualizarCarrera');

    Route::get('/respaldo', 'AdminController@adminDashboard');
    Route::get('/ayuda', 'AdminController@adminDashboard');
});

Route::get('/home', 'HomeController@index')->name('home');

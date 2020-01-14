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
Route::get('/categorias/{categoriaId}', 'CategoriaController@mostrar');
Route::get('/categorias/{categoriaId}/editar', 'CategoriaController@editar');
Route::post('/categorias/{categoriaId}', 'CategoriaController@actualizar');
Route::post('/categorias', 'CategoriaController@guardar');

Route::get('/copias', 'CopiaController@index');
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

Route::get('/prestamos/crear', 'PrestamoController@crear');
Route::get('/prestamos/realizados', 'PrestamoController@indexRealizados');
Route::get('/prestamos/activos', 'PrestamoController@indexActivos');
Route::get('/prestamos/{prestamoId}', 'PrestamoController@mostrar');
Route::get('/prestamos/{prestamoId}/retornar', 'PrestamoController@retornar');
Route::post('/prestamos/{prestamoId}', 'PrestamoController@guardarRetorno');
Route::post('/prestamos', 'PrestamoController@guardar');

Route::group(['prefix' => 'api'], function() {
    Route::get('/copias', 'CopiaController@getCopias');
    Route::get('/libros', 'LibroController@getLibros');
    Route::get('/autores', 'AutorController@getAutores');
    Route::post('/autores', 'AutorController@postAutores');
    Route::get('/categorias', 'CategoriaController@getCategorias');
    Route::get('/estados', 'EstadoController@getEstados');
    Route::get('/prestamos', 'PrestamoController@getPrestamos');
    Route::get('/prestamos/activos', 'PrestamoController@getPrestamosActivos');
    Route::get('/prestamos/realizados', 'PrestamoController@getPrestamosRealizados');
    Route::post('/prestamos', 'PrestamoController@postPrestamo');
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'api'], function() {
        // Usuarios
        Route::get('/usuarios', 'AdminController@getUsuarios');
        Route::post('/usuarios', 'AdminController@postUsuario');

        Route::get('/roles', 'RoleController@getRoles');
        Route::post('/roles', 'RoleController@postRol');

        Route::get('/carreras', 'CarreraController@getCarreras');
        Route::post('/carreras', 'CarreraController@postCarrera');
    });
    Route::get('/dashboard', 'AdminController@adminDashboard');
    Route::get('/prestamos', 'AdminController@prestamosIndex');
    
    // Usuarios - Index
    Route::get('/usuarios', 'AdminController@indexUsuarios');
    Route::get('/roles', 'RoleController@index');
    Route::get('/carreras', 'CarreraController@index');

    // Usuarios - Mostrar
    Route::get('/usuarios/{userId}', 'AdminController@mostrarUsuario');
    Route::get('/roles/{rolId}', 'RoleController@mostrarRol');
    Route::get('/carreras/{carreraId}', 'CarreraController@mostrarCarrera');

    // Usuarios - Crear y guardar 
    Route::get('/usuarios/crear', 'AdminController@crearUsuario');
    Route::get('/roles/crear', 'RoleController@crearRol');
    Route::get('/carreras/crear', 'CarreraController@crearCarrera');
    
    Route::post('/usuarios/guardar', 'AdminController@guardarUsuario');
    Route::post('/roles/guardar', 'RoleController@guardarRol');
    Route::post('/carreras/guardar', 'CarreraController@guardarCarrera');

    // Usuarios - Editar y actualizar
    Route::get('/usuarios/{userId}/editar', 'AdminController@editarUsuario');
    Route::get('/roles/{rolId}/editar', 'RoleController@editarRol');
    Route::get('/carreras/{carreraId}/editar', 'CarreraController@editarCarrera');
    
    Route::post('/usuarios/{userId}', 'AdminController@actualizarUsuario');
    Route::post('/roles/{rolId}', 'RoleController@actualizarRol');
    Route::post('/carreras/{carreraId}', 'CarreraController@actualizarCarrera');

    Route::get('/respaldo', 'AdminController@adminDashboard');
    Route::get('/ayuda', 'AdminController@adminDashboard');
});

Route::get('/home', 'HomeController@index')->name('home');

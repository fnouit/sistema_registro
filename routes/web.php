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


Auth::routes();

// Administrador
Route::middleware(['auth','admin'])->group(function()
{
    Route::get('/home', 'Admin\UsuarioController@index')->name('home');
    Route::get('/usuario/{id}','Admin\UsuarioController@show')->name('usuario');
    Route::get('/usuario/{id}/editar','Admin\UsuarioController@edit')->name('mostrar'); 
    Route::put('usuario/{id}/editar','Admin\UsuarioController@update')->name('actualizar');
    Route::delete('/usuario/{id}', 'Admin\UsuarioController@destroy')->name('eliminar'); 
    Route::get('exportar-archivo/{type}', 'Admin\UsuarioController@exportar')->name('exportar_archivo');

    # Regiones
    Route::get('/regiones', 'Admin\RegionController@index')->name('mostrar.regiones'); // Mostrar Regiones
    Route::put('/region/{slug}/edit', 'Admin\RegionController@update')->name('region.edit');

    # Delegaciones
    Route::get('/delegaciones', 'Admin\DelegacionController@index')->name('mostrar.delegaciones'); // Mostrar delegaciones
    Route::get('/delegacion/crear', 'Admin\DelegacionController@create')->name('crear.delegacion'); // Crear delegaciones
    Route::post('/delegacion', 'Admin\DelegacionController@store')->name('guardar.delegacion'); // Crear delegaciones
    Route::delete('/delegacion/{slug}', 'Admin\DelegacionController@destroy')->name('borrar.delegacion'); // Borrar delegaciones

    Route::put('/delegacion/{slug}/edit', 'Admin\DelegacionController@update')->name('delegacion.edit');
    Route::get('/region/{id}/delegaciones', 'Admin\DelegacionController@delegaciones'); // Mostrar delegaciones por región
    Route::get('/region/delegaciones', 'Admin\DelegacionController@delegacionesAll'); // Mostrar todas las delegaciones
});


# Página inicial para registro 
Route::get('/','RegistrarUsuarioController@index')->name('inicio');
Route::post('/nuevo_usuario', 'RegistrarUsuarioController@store')->name('registrar.usuario'); # Registrar usuarios
Route::get('/buscar', 'RegistrarUsuarioController@buscar')->name('buscar'); # Buscar registro
Route::get('/privacidad', 'RegistrarUsuarioController@privacidad')->name('privacidad'); # Página de privacidad
Route::get('/verificacion', 'RegistrarUsuarioController@verificacion')->name('verificacion'); # Página para verificar si estas registrado

 
/* Route::group(['prefix'=>'congreso-preescolar-2019'], function()
{
    Route::get('/mostrar_talleres','RegistrarUsuarioController@talleres')->name('mostrar_talleres'); # Página donde se muestran todos los talleres
    Route::get('/taller','RegistrarUsuarioController@taller')->name('taller'); # Página donde se muestran todos los talleres
    Route::get('/registrarse', 'RegistrarUsuarioController@create')->name('registrarse');  # Registrar usuarios
    Route::post('/registrarse', 'RegistrarUsuarioController@store')->name('enviar_registro'); # Almacenar la información
    Route::put('/registrarse/registrar_taller/{id}', 'RegistrarUsuarioController@actualizar_usuario_taller')->name('actualizar_usuario_taller');


    Route::get('/verificacion', 'RegistrarUsuarioController@verificacion')->name('verificacion'); # Página para verificar si estas registrado
    Route::get('/buscar', 'RegistrarUsuarioController@buscar')->name('buscar'); # Buscar registro
    Route::get('/folio/{codigo_confirmacion}', 'RegistrarUsuarioController@folio')->name('folio'); # Exportar pdf
    Route::get('/privacidad', 'RegistrarUsuarioController@privacidad')->name('privacidad'); # Página de privacidad
}); */






Route::get('/regiones/{id}/delegaciones','DelegacionController@delegaciones');


# Ruta de creación de PDF

Route::get('/pdf', function()
{
    
    // $pdf = PDF::loadHtml('<h1>Prueba</h1>'); # Carga un HTML
    
    $pdf = PDF::loadView('congreso-preescolar.pdf_export'); # Carga una vista 
    
    
    // return $pdf->stream(); # muestra el PDF en una ventana
    return $pdf->download(); # descarga el PDF
});;
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

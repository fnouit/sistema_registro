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
});


# Página inicial para registro 
Route::get('/','RegistrarUsuarioController@index')->name('inicio');
Route::post('/nuevo_usuario', 'RegistrarUsuarioController@store')->name('registrar.usuario'); # Registrar usuarios
Route::get('/confirmacion/{code}/registro', 'RegistrarUsuarioController@success')->name('success'); #Confirmación de registro
Route::get('/descargar_folio/{folio}', 'RegistrarUsuarioController@folio')->name('descargar.folio'); # Descargar folio de registro

Route::get('/busqueda','RegistrarUsuarioController@busqueda')->name('buscar.usuario'); #Página para buscar usuario registrado
Route::post('/buscar', 'RegistrarUsuarioController@buscar')->name('buscar'); # Buscar registro
Route::get('/verificacion', 'RegistrarUsuarioController@verificacion')->name('verificacion'); # Página para verificar si estas registrado
Route::get('/privacidad', 'RegistrarUsuarioController@privacidad')->name('privacidad'); # Página de privacidad

# URL para descargar convocatoria en PDF
Route::get('/convocatoria' , function (){
    #return url('http://sistema_registro.test/descargas/CAMPAMENTO_DEPORTIVO_2019.jpg');

    $file= public_path(). "/descargas/CAMPAMENTO_DEPORTIVO_2019.jpg";   

    return response()->download($file);    
})->name('convocatoria');




Route::get('/regiones/{id}/delegaciones','DelegacionController@delegaciones');


# Ruta de creación de PDF

// Route::get('generate-pdf','RegistrarUsuarioController@generatePDF');


Route::get('/pdf', function()
{
    
    // $pdf = PDF::loadHtml('<h1 style="color:red;">Prueba</h1>'); # Carga un HTML
    
    // $pdf = PDF::loadView('congreso-preescolar.pdf_export'); # Carga una vista 
    
    
    // return $pdf->stream(); # muestra el PDF en una ventana
    // return $pdf->download(); # descarga el PDF
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

use App\Usuario;
use App\Delegacion;
Route::get('/excel',function(){


/*
    return Delegacion::all();
    $users = DB::table('users')->select('name', 'email as user_email')->get();
            $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();

*/

    return Usuario::select (
        'usuarios.id as NO',
        'usuarios.codigo_confirmacion as FOLIO',
        'usuarios.nombre as NOMBRE',
        'usuarios.apellido_p as A_PATERNO',
        'usuarios.apellido_m as A_MATERNO',
        'usuarios.genero as GENERO',
        'usuarios.correo as CORREO',
        'usuarios.rfc as RFC',
        'usuarios.telefono as TELEFONO',
        'usuarios.num_personal as NUM_PERSONAL',
        'usuarios.zona_e as ZONA_E',
        'usuarios.clave_ct as CT',
        'nomenclaturas.nomenclatura as NOMENCLATURA',
        'delegacions.numero as NUMERO',
        'delegacions.sede as SEDE',
        'usuarios.delegacion_opc as DELEG',
        'regions.nombre as REGION_NOMBRE',
        'regions.sede as REGION_SEDE')
        ->join('delegacions' , 'usuarios.delegacion_id', '=', 'delegacions.id')
        ->join('nomenclaturas', 'delegacions.nomenclatura_id', '=', 'nomenclaturas.id')
        ->join('regions', 'delegacions.region_id', '=', 'regions.id')
        ->get();

});
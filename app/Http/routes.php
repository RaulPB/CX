<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','FrontController@index');  //AQUI INICIA EL PROYECTO IFIIX
Route::resource('log','LogController'); //para iniciar sesion (validaciones)
Route::get('admin','FrontController@admin');//AQUI MANDAMOS AL PANEL DE CONTROL DE ADMINISTRADOR VISTA DESPUES DE PASAR LA VALIDACION CORRESPONDIENTE.
Route::resource('usuario','UsuarioController');//para dar de alta usuarios, editarlos y crearlos
Route::resource('cliente','ClienteController');//para crear, visualizar y editar clientes
Route::resource('proveedor','ProveedorController');//para crear, visualizar y editar proveedores
Route::resource('servicio','ServsController'); //para visualizar y editar ordenes de servicio (reparación de equipos)
Route::resource('tecnico','TecnicoController'); //para visualizar y editar ordenes de servicio (reparación de equipos solo para tecnico)
Route::resource('chofer','choferController'); //para visualizar y editar entregas y recolecciones
Route::resource('producto','InventarioController'); //para INICIAR LOS DATOS DE VENTA DIARIA.
Route::resource('venta','VentaController'); //para generar encabezados de las ventas.
Route::resource('ventas','VenController'); //para generar ventas y reducir el inventario ADMINISTRADOR.
Route::resource('cotizacion','CotizacionController'); //para generar COTIZACIONES.
Route::resource('impcoti','ImcotizaController'); //para imprimir las cotizaciones
Route::get('logout','LogController@logout');//Para salir de la sesion iniciada
Route::resource('acerca','AcercaController');//Para ver acerca de
Route::get('diaria', 'DiariaController@diaria');//Para sacar reporte diario
Route::get('real', 'DiariaController@real');//Para sacar reporte diario
Route::get('cuentas', 'DiariaController@cuentas');//Para sacar reporte diario
Route::resource('filtrada', 'FiltraController');//Para sacar reporte de cuentas por pagar pero por cliente

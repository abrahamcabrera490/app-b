<?php

use Illuminate\Support\Facades\Route;

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





    

Route::group(['middleware' => 'web'], function () {
    Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




/* ||||||======== Rutas index departamentos ======|||||*/

Route::get('/sistemas', [App\Http\Controllers\SistemasController::class, 'index'])->name('sistemas');
Route::get('/admon', [App\Http\Controllers\AdmonController::class, 'index'])->name('admon');
Route::get('/almacen', [App\Http\Controllers\AlmacenController::class, 'index'])->name('almacen');
Route::get('/cobranza', [App\Http\Controllers\CobranzaController::class, 'index'])->name('cobranza');
Route::get('/compras', [App\Http\Controllers\ComprasController::class, 'index'])->name('compras');
Route::get('/conta', [App\Http\Controllers\ContaController::class, 'index'])->name('conta');
Route::get('/logistica', [App\Http\Controllers\logisticaController::class, 'index'])->name('logistica');
Route::get('/mtto', [App\Http\Controllers\mttoController::class, 'index'])->name('mtto');
Route::get('/produc', [App\Http\Controllers\ProduccionController::class, 'index'])->name('produc');
Route::get('/rh', [App\Http\Controllers\RhController::class, 'index'])->name('rh');









/* ||||||======== Rutas index departamentos ======|||||*/


/**==========| Accion Captura de datos |========== **/
Route::post('/cap', [App\Http\Controllers\SistemasController::class, 'cap'])->name('cap');
Route::post('/admoncap', [App\Http\Controllers\AdmonController::class, 'cap'])->name('admoncap');
Route::post('/almacencap', [App\Http\Controllers\AlmacenController::class, 'cap'])->name('almacencap');
Route::post('/cobranzacap', [App\Http\Controllers\CobranzaController::class, 'cap'])->name('cobranzacap');
Route::post('/comprascap', [App\Http\Controllers\ComprasController::class, 'cap'])->name('comprascap');
Route::post('/contacap', [App\Http\Controllers\ContaController::class, 'cap'])->name('contacap');
Route::post('/logisticacap', [App\Http\Controllers\logisticaController::class, 'cap'])->name('logisticacap');
Route::post('/mttocap', [App\Http\Controllers\mttoController::class, 'cap'])->name('mttocap');
Route::post('/produccap', [App\Http\Controllers\ProduccionController::class, 'cap'])->name('produccap');
Route::post('/rhcap', [App\Http\Controllers\RhController::class, 'cap'])->name('rhcap');



/**==========| Accion Captura de datos |========== **/


/** ==========| Accion Promedio de datos |========== **/
Route::GET('/prom', [App\Http\Controllers\SistemasController::class, 'prom'])->name('prom');
Route::GET('/admonprom', [App\Http\Controllers\AdmonController::class, 'prom'])->name('admonprom');
Route::GET('/almacenprom', [App\Http\Controllers\AlmacenController::class, 'prom'])->name('almacenprom');
Route::GET('/cobranzaprom', [App\Http\Controllers\CobranzaController::class, 'prom'])->name('cobranzaprom');
Route::GET('/comprasprom', [App\Http\Controllers\ComprasController::class, 'prom'])->name('comprasprom');
Route::GET('/contaprom', [App\Http\Controllers\contaController::class, 'prom'])->name('contaprom');
Route::GET('/logisticaprom', [App\Http\Controllers\logisticaController::class, 'prom'])->name('logisticaprom');
Route::GET('/mttoprom', [App\Http\Controllers\mttoController::class, 'prom'])->name('mttoprom');
Route::GET('/producprom', [App\Http\Controllers\ProducController::class, 'prom'])->name('producprom');
Route::GET('/rhprom', [App\Http\Controllers\RhController::class, 'prom'])->name('rhprom');

/** ==========| Accion Promedio de datos |========== **/

/**=================================| Rutas de Accion usuarios |=================================*/
Route::GET('/usr', [App\Http\Controllers\UsersController::class, 'index'])->name('Usr');
Route::GET('/usredit/{id}', [App\Http\Controllers\UsersController::class, 'usredit'])->name('usredit');


/**=================================| Rutas de Accion usuarios |=================================*/

/**=================================| Rutas de Ticket Sistemas |=================================*/
Route::GET('/ticket', [App\Http\Controllers\UsersTicket::class, 'index'])->name('ticket');
Route::GET('/orders_show', [App\Http\Controllers\UsersTicket::class, 'orders_show'])->name('orders_show');
Route::GET('/run_ticket/{id}', [App\Http\Controllers\UsersTicket::class, 'run_ticket'])->name('run_ticket');
Route::POST('/newticket', [App\Http\Controllers\UsersTicket::class, 'newticket'])->name('newticket');
Route::GET('/run_ticket/{id}', [App\Http\Controllers\UsersTicket::class, 'run_ticket'])->name('run_ticket');
Route::GET('/print/{id}', [App\Http\Controllers\UsersTicket::class, 'print'])->name('print');
Route::GET('/watch_image/{filename}', [App\Http\Controllers\UsersTicket::class, 'watch_image'])->name('watch_image');
Route::patch('/close_ticket/{id}', [App\Http\Controllers\UsersTicket::class, 'close_ticket'])->name('close_ticket.update');
/**=================================| Rutas de Ticket Sistemas |=================================*/

/**=================================| Rutas de la PWA |=================================*/
Route::get('/offline', function () {    
    return view('vendor/laravelpwa/offline');
    });
/**=================================| Rutas de la PWA |=================================*/
});
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
Route::get('/sistemas', [App\Http\Controllers\SistemasController::class, 'index'])->name('sistemas');
Route::post('/cap', [App\Http\Controllers\SistemasController::class, 'cap'])->name('cap');
Route::GET('/prom', [App\Http\Controllers\SistemasController::class, 'prom'])->name('prom');
Route::GET('/usr', [App\Http\Controllers\UsersController::class, 'index'])->name('Usr');
Route::GET('/usredit/{id}', [App\Http\Controllers\UsersController::class, 'usredit'])->name('usredit');
Route::GET('/ticket', [App\Http\Controllers\UsersTicket::class, 'index'])->name('ticket');
Route::GET('/orders_show', [App\Http\Controllers\UsersTicket::class, 'orders_show'])->name('orders_show');
Route::GET('/run_ticket/{id}', [App\Http\Controllers\UsersTicket::class, 'run_ticket'])->name('run_ticket');
Route::post('/newticket', [App\Http\Controllers\UsersTicket::class, 'newticket'])->name('newticket');
Route::GET('/run_ticket/{id}', [App\Http\Controllers\UsersTicket::class, 'run_ticket'])->name('run_ticket');
Route::GET('/print/{id}', [App\Http\Controllers\UsersTicket::class, 'print'])->name('print');
Route::GET('/watch_image/{filename}', [App\Http\Controllers\UsersTicket::class, 'watch_image'])->name('watch_image');
Route::patch('/close_ticket/{id}', [App\Http\Controllers\UsersTicket::class, 'close_ticket'])->name('close_ticket.update');


});
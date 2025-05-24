<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\MateriaPrimaController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});




Route::middleware(['auth'])->group(function () {

    Route::resource('clientes', ClienteController::class);
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('almacen', AlmacenController::class);
    Route::resource('movimientos', MovimientoController::class);
    Route::resource('transportes', TransporteController::class);
    Route::resource('reportes', ReporteController::class);
    Route::resource('users', UserController::class);
    Route::resource('materiasPrimas', MateriaPrimaController::class);

    Route::put('/materiasPrimas/{materiasPrima}', [MateriaPrimaController::class, 'update'])->name('materiasPrimas.update');

    Route::get('/reportes/generate', [ReporteController::class, 'generate'])->name('reportes.generate');
    Route::get('/reportes/pdf/{reporte}', [ReporteController::class, 'generatePDF'])->name('reportes.pdf');
    Route::get('/reportes/filter', [ReporteController::class, 'filter'])->name('reportes.filter');


});



Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

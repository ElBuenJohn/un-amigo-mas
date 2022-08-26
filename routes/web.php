<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Models\mascota;
use Illuminate\Routing\Route as RoutingRoute;

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
/*/
Route::get('/', function () {
    return view('welcome');
});


Route::get('/mascota', function () {
    return view('mascota.index');
});


Route::get('/mascota/create',[MascotaController::class,'create']);*/


Route::resource('mascota', MascotaController::class);

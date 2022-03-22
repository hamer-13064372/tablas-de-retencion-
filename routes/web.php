<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

use App\Http\Controllers\ActaController;
use App\Http\Controllers\CircularController;
use App\Http\Controllers\ConcejoController;
use App\Http\Controllers\DirectivaController;
use App\Http\Controllers\OficioController;
use App\Http\Controllers\SecretariaController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


              // RUTAS ACTA                  

Route::middleware(['auth:sanctum'])->get('/api/acta',[ActaController::class,'index'])->name('acta');
Route::middleware(['auth:sanctum'])->get('/api/acta/data',[ActaController::class,'indexData']);
Route::middleware(['auth:sanctum'])->get('/api/acta/getacta',[ActaController::class,'getActa']);
Route::middleware(['auth:sanctum'])->post('/api/acta/registrar',[ActaController::class,'store']);
Route::middleware(['auth:sanctum'])->put('/api/acta/actualizar',[ActaController::class,'update']);
Route::middleware(['auth:sanctum'])->post('/api/acta/eliminar',[ActaController::class,'destroy']);


              // RUTAS CIRCULAR

Route::middleware(['auth:sanctum'])->get('/api/circular',[CircularController::class,'index'])->name('circular');
Route::middleware(['auth:sanctum'])->get('/api/circular/data',[CircularController::class,'indexData']);
Route::middleware(['auth:sanctum'])->get('/api/circular/getcircular',[CircularController::class,'getActa']);
Route::middleware(['auth:sanctum'])->post('/api/circular/registrar',[CircularController::class,'store']);
Route::middleware(['auth:sanctum'])->put('/api/circular/actualizar',[CircularController::class,'update']);
Route::middleware(['auth:sanctum'])->post('/api/circular/eliminar',[CircularController::class,'destroy']);


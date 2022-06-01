<?php

use Illuminate\Support\Facades\Route;
//agregamos los siguientes controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RegionalController;
use App\Http\Controllers\ContratosController;
use App\Http\Controllers\OatencionController;
use App\Http\Controllers\OservicioController;
use App\Http\Controllers\AuditorController;
use App\Http\Controllers\FacturadorController;
use App\Http\Controllers\BeneficiariosController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\RjuridicaController;
use App\Http\Controllers\ValidadorController;

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

Route::post('/getState', [OservicioController::class, 'getState']);
Route::post('/getState2', [FacturadorController::class, 'getState2']);
/* Route::post('/getCity', [OservicioController::class, 'getCity']); */
Route::get('/', function () {
    return view('auth/login');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//y creamos un grupo de rutas protegidas para los controladores
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('regional', RegionalController::class);
    Route::resource('contratos', ContratosController::class);
    Route::resource('oservicios', OservicioController::class);
    Route::resource('oatencion', OatencionController::class);
    Route::resource('facturador', FacturadorController::class);
    Route::resource('auditor', AuditorController::class);
    Route::resource('supervisor', SupervisorController::class);
    Route::resource('tesoreria', BlogController::class);
    Route::resource('beneficiarios', BeneficiariosController::class);
    Route::resource('funcionarios', FuncionariosController::class);
    Route::resource('validador', ValidadorController::class);
    Route::resource('revjuridica', RjuridicaController::class);
});
Route::get('oservicio/{num_oservicio}/download', [OservicioController::class, 'download'])->name('oservicioPDF.download');
Route::get('public/PDF_oservicio/{num_oservicio}', [AuditorController::class, 'aprobar'])->name('oservicioPDF.aprobado');
Auth::routes();

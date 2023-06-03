<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MachineController;
use App\Http\Controllers\InicialController;
use App\Http\Controllers\MostraDadosController;
use App\Http\Controllers\TodosCarrosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RelacionamentoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FgtsController;
use App\Http\Controllers\PrefeituraController;
use App\Http\Controllers\DadosController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\UserPrefeituraController;
use App\Http\Controllers\UserFGTSController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\INSSController;
use App\Http\Controllers\UserINSSController;
use App\Http\Controllers\SMSController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/',[InicialController::class,'index']);
    Route::get('/mostradados',[MostraDadosController::class,'index']);
    Route::get('/mostradados/email',[MostraDadosController::class,'email']);
    Route::get('/todoscarros',[TodosCarrosController::class,'index']);
    Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard/{id}', [DashboardController::class, 'show'])->name('dashboard.show');
    Route::get('/dashboard/{id}/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
    Route::get('/dashboard/data/{type}/{date}', 'DashboardController@getData')->name('dashboard.data');
    Route::get('/relacionamentos', 'App\Http\Controllers\RelacionamentoController@index')->name('relacionamento.index');
    Route::get('/relacionamento/{id}/edit', 'App\Http\Controllers\RelacionamentoController@edit')->name('relacionamento.edit');
    Route::put('/relacionamento/{id}', 'App\Http\Controllers\RelacionamentoController@update')->name('relacionamento.update');
    Route::put('/relacionamento/{id}', [RelacionamentoController::class, 'update'])->name('relacionamento.update');
    Route::any('/copy-to-imovel-table', [MostraDadosController::class, 'copyToImovelTable']);
    Route::post('/mover-dados', [MostraDadosController::class, 'moverDados'])->name('moverDados');
    Route::get('/fgts', [FgtsController::class, 'index'])->name('fgts.index');
    Route::get('/prefeituras', [PrefeituraController::class, 'index'])->name('prefeituras.index');
    Route::get('/dados', [DadosController::class, 'index'])->name('dados');
    Route::get('/search/{searchQuery}', [UserDataController::class, 'searchUserData']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::post('/fgts/cidade', [FgtsController::class, 'cidade'])->name('fgts.cidade');
    Route::get('/user-prefeitura/{id}', [UserPrefeituraController::class, 'show'])->name('user.prefeitura');
    Route::get('/user-fgts/{id}', [UserFGTSController::class, 'index'])->name('user.fgts');
    Route::get('/user/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user/update', [UserController::class, 'update'])->name('users.update');
    Route::get('/inss', [INSSController::class, 'index'])->name('inss.index');
    Route::get('/user-inss/{id}', [UserINSSController::class, 'index'])->name('user-inss');
    Route::post('/enviar-sms', [SMSController::class, 'enviarSMS'])->name('sms.enviar');
    Route::get('/enviar-sms', [SMSController::class, 'exibirFormulario'])->name('sms.formulario');



});

// Rotas de login e registro
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


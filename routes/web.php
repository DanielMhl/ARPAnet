<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ContratadoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\DashboardController;
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
//ROTA DO DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//ROTA DE VENDAS
Route::get('/vendas', [VendaController::class, 'index'])->name('vendas.index');
Route::get('/vendas/create', [VendaController::class, 'create'])->name('vendas.create');
Route::post('/vendas', [VendaController::class, 'store'])->name('vendas.store');

//ROTA DE LOGIN
Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('login/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('login/logout', [LoginController::class, 'logout'])->name('login.logout');

//ROTA DE PRODUTOS
 Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
 Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
 Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');

 //ROTA DE PESSOAS
 Route::get('/pessoas', [PessoaController::class, 'index'])->name('pessoas.index');
 Route::get('/pessoas/create', [PessoaController::class, 'create'])->name('pessoas.create');
 Route::post('/pessoas', [PessoaController::class, 'store'])->name('pessoas.store');

//ROTA DE CONTRATADOS (Quebrado, não abrir)
// Route::get('/contratados', [ContratadoController::class, 'index'])->name('contratados.index');
// Route::get('/contratados/create', [ContratadoController::class, 'create'])->name('contratados.create');
// Route::post('/contratados', [ContratadoController::class, 'store'])->name('contratados.store');

//ROTAS USUARIOS
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy'); //deletar registro
Route::get('/usuarios/edit/{id}', [UsuarioController::class, 'edit'])->name('usuarios.edit'); //formulário de edição
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update'); //atualizar registro






<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ContratadoController;
use App\Http\Controllers\AssociadoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Artisan;
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
Route::delete('/produtos/{idProduto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy'); //deletar registro
Route::get('/produtos/edit/{idProduto}', [ProdutoController::class, 'edit'])->name('produtos.edit'); //formulário de edição
Route::put('/produtos/{idProduto}', [ProdutoController::class, 'update'])->name('produtos.update'); //atualizar registro


 //ROTA DE PESSOAS
Route::get('/pessoas', [PessoaController::class, 'index'])->name('pessoas.index');
Route::get('/pessoas/create', [PessoaController::class, 'create'])->name('pessoas.create');
Route::post('/pessoas', [PessoaController::class, 'store'])->name('pessoas.store');
Route::delete('/pessoas/{idPessoa}', [PessoaController::class, 'destroy'])->name('pessoas.destroy'); //deletar registro
Route::get('/pessoas/edit/{idPessoa}', [PessoaController::class, 'edit'])->name('pessoas.edit'); //formulário de edição
Route::put('/pessoas/{idPessoa}', [PessoaController::class, 'update'])->name('pessoas.update'); //atualizar registro

//ROTA DE CONTRATADOS
Route::get('/contratados', [ContratadoController::class, 'index'])->name('contratados.index');
Route::get('/contratados/create', [ContratadoController::class, 'create'])->name('contratados.create');
Route::post('/contratados', [ContratadoController::class, 'store'])->name('contratados.store');
Route::delete('/contratados/{idContratado}', [ContratadoController::class, 'destroy'])->name('contratados.destroy'); //deletar registro
Route::get('/contratados/edit/{idContratado}', [ContratadoController::class, 'edit'])->name('contratados.edit'); //formulário de edição
Route::put('/contratados/{idContratado}', [ContratadoController::class, 'update'])->name('contratados.update'); //atualizar registro

//ROTA DE ASSOCIADOS
Route::get('/associados', [AssociadoController::class, 'index'])->name('associados.index');
Route::get('/associados/create', [AssociadoController::class, 'create'])->name('associados.create');
Route::delete('/associados/{idAssociado}', [AssociadoController::class, 'destroy'])->name('associados.destroy'); //deletar registro
Route::get('/associados/edit/{idAssociado}', [AssociadoController::class, 'edit'])->name('associados.edit'); //formulário de edição
Route::put('/associados/{idAssociado}', [AssociadoController::class, 'update'])->name('associados.update'); //atualizar registro
Route::post('/associados', [AssociadoController::class, 'store'])->name('associados.store');

//ROTAS USUARIOS
//INDEX
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

//CRIAR USUÁRIO
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

//DELETAR USUÁRIO
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy'); //deletar registro

//EDITAR USUÁRIO
Route::get('/usuarios/edit/{id}', [UsuarioController::class, 'edit'])->name('usuarios.edit'); //formulário de edição
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update'); //atualizar registro

//EDITAR USUÁRIO LOGADO
Route::get('/usuarios/alterar/{id}', [UsuarioController::class, 'alt'])->name('usuarios.alt'); //formulário de atualização
// Route::get('/usuarios/alterar/{id}/{modal?}', [UsuarioController::class, 'alt'])->name('usuarios.alt'); //formulário de atualização
Route::put('/usuarios/atualizar/{id}', [UsuarioController::class, 'update_alt'])->name('usuarios.update_alt'); //atualizar registro

//TROCAR SENHA USUÁRIO LOGADO
// Route::get('/usuarios/pass/{id}', [UsuarioController::class, 'pass'])->name('usuarios.pass');
Route::put('/usuarios/updatepass/{id}', [UsuarioController::class, 'updatepass'])->name('usuarios.updatepass'); //trocar senha
/* CEMITÉRIO ✞ */
// Route::put('/usuarios/modifypass/{id}', [UsuarioController::class, 'modifypass'])->name('usuarios.modifypass'); //trocar senha
// function ($id) {return 'User '.$id;} , -> TESTE VARIÁVEL
// array_merge(\Illuminate\Support\Facades\Route::current()->parameters(), ['locale' => 'en'])

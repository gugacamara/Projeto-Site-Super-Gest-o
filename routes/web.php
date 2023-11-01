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

// A ordem middleware, get e name não importa, porém a ordem seria essa.
Route::get('/', 'PrincipalController@principal')-> name('site.index');

Route::get('/sobre-nos', 'SobrenosController@sobrenos') -> name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')-> name('site.contato');

Route::post('/contato', 'ContatoController@salvar_Dados')-> name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')-> name('site.login');
Route::post('/login', 'LoginController@autenticar')-> name('site.login');

Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function(){
    Route::get('/home', 'HomeController@index')-> name('app.home');
    Route::get('/sair', 'LoginController@sair')-> name('app.sair');

    Route::get('/fornecedor', 'FornecedorController@index')-> name('app.fornecedor');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')-> name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')-> name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')-> name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')-> name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')-> name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')-> name('app.fornecedor.excluir');

    //Habilitando todas as rotas do controller(resource)
    //Cria rotas automaticamente
    Route::resource('produto', 'ProdutoController');

    Route::resource('produto-detalhe', 'ProdutoDetalheController');

    Route::resource('cliente', 'ClienteController');
    Route::resource('pedido', 'PedidoController');
    Route::resource('pedido-produto', 'PedidoProdutoController');
});

Route::get('/teste/{p1}/{p2}', 'testeController@teste')-> name('teste');

    //Rota com contigência(fallback)
Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para a página inicial';
});

// GET: Solicita ao servidor um recurso específico e normalmente retorna apenas dados.
// PUT: Normalmente usado para adicionar ou incluir algo no servidor.
// POST: Utilizado para realizar uma alteração nos dados do servidor. É frequentemente usado para criar recursos.
// DELETE: Remove um recurso do servidor.

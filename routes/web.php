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
Route::get('/', 'PrincipalController@principal')
    //->middleware('log.acesso')
    -> name('site.index');

Route::get('/sobre-nos', 'SobrenosController@sobrenos') -> name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')-> name('site.contato');
Route::post('/contato', 'ContatoController@salvar_Dados')-> name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')-> name('site.login');
Route::post('/login', 'LoginController@autenticar')-> name('site.login');

Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function(){
    Route::get('/home', 'HomeController@index')-> name('app.home');
    Route::get('/sair', 'LoginController@sair')-> name('app.sair');
    Route::get('/cliente', 'ClienteController@index')-> name('app.cliente');
    Route::get('/fornecedor', 'FornecedorController@index')-> name('app.fornecedor');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')-> name('app.fornecedor.listar');
    Route::get('/produto', 'ProdutoController@index')-> name('app.produto');
});

Route::get('/teste/{p1}/{p2}', 'testeController@teste')-> name('teste');

    //Rota com contigência(fallback)
Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para a página inicial';
});

    // Usando expressões regulares
    // Route::get('/contato/{nome}/{categoria_Id}',
    //  function(
    //     string $nome,
    //     int $categoria_Id = 1)
    //  {
    //     echo "Contato: $nome $categoria_Id";
    //  })-> where('categoria_Id', '[0-9]+') -> where('nome', '[A-Za-z]+');

    //Rota com parâmetro opcional
    // Route::get('/contato/{nome}/{categoria?}',
    //  function(
    //     string $nome,
    //     string $categoria = 'Mensagem não informada')
    //  {
    //     echo 'Contato '.$nome. ' '.$categoria;
    //  });

    // Rota com parâmetro
    // Route::get('/contato/{nome}/{categoria}', function($nome, $categoria) {
    //     echo 'Contato '.$nome. ' '.$categoria;
    // });

    // Rota funcional
    // Route::get('/contato', function () {
    //     return '<h1>Contato</h1>';
    // });



    /* verbos
 http
get
post
put
patch
delete
options
*/

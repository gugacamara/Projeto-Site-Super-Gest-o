<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterProdutosRelacionamentosFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    //Criando a fornecedor_id na tabela produtos
    Schema::table('produtos', function (Blueprint $table) {
        // Inserindo registro para não dar erro(para não precisar apagar os dados da tabela, para iniciar a foreign)
        //não seria necessário se não tivesse dados na tabela
        $fornecedor_id = DB::table('fornecedores')->insertGetId([
            'nome' => 'Fornecedor Padrão SG',
            'site' => 'fornecedorpadraosg.com.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedorpadraosg.com.br'
        ]);

        $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
        $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    //Removendo a fornecedor_id na tabela produtos
    Schema::table('produtos', function (Blueprint $table) {
        //removendo a foreign key
        $table->dropForeign('produtos_fornecedor_id_foreign');
        //removendo a coluna fornecedor_id
        $table->dropColumn('fornecedor_id');
    });
    }
}

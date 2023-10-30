<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_detalhes', function (Blueprint $table) {
            $table->id();
            //Quando se exporta uma chave estrangeira, é necessário
            //usar uma coluna de mesmo tipo da chave primária da tabela de origem
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento', 8, 2);
            $table->float('largura', 8, 2);
            $table->float('altura', 8, 2);
            $table->timestamps();

            //Constraint
            // Relacionamento 1 para 1
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id'); //garante que não haverá produtos duplicados na tabela produtos_detalhes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos_detalhes');
    }
}

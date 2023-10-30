<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); //cm, mm, kg
            $table->string('descricao', 30); //centimetro, milimetro, kilograma
            $table->timestamps();

        });

        // Relacionamento 1 para muitos em unidades com produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id'); //cria a coluna unidade_id na tabela produtos
            $table->foreign('unidade_id')->references('id')->on('unidades'); //cria a chave estrangeira unidade_id que referencia a coluna id da tabela unidades
        });

        // Relacionamento 1 para muitos em unidades com produtos_detalhes
        Schema::table('produtos_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Para deletar a tabela será preciso remover as chaves estrangeiras
        Schema::table ('produtos_detalhes', function (Blueprint $table) {
            //remover a fk
            $table->dropForeign('produtos_detalhes_unidade_id_foreign'); //[table]_[coluna]_foreign
            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        Schema::table ('produtos', function (Blueprint $table) {
            //remover a fk
            $table->dropForeign('produtos_unidade_id_foreign'); //[table]_[coluna]_foreign
            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
}

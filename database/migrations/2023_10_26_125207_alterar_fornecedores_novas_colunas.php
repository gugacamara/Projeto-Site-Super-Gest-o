<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterarFornecedoresNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   // Adicionando novas colunas na tabela fornecedores
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('uf', 2);
            $table->string('email', 150);
        });
    }

    /**
     * Reverse the migrations.
     *F
     * @return void
     */
    public function down()
    {
        // Removendo colunas da tabela fornecedores
        Schema::table('fornecedores', function (Blueprint $table) {
            // $table->dropColumn('uf');
            // $table->dropColumn('email');
            $table->dropColumn(['uf', 'email']);

        // Comandos para reversão de migrações
        // Comando: php artisan migrate:rollback
        // step = 2: reverte as duas últimas migrações
        // Comando: php artisan migrate:rollback --step=2
    });
    }
}

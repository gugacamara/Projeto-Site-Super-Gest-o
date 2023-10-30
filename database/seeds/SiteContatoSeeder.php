<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SiteContato::class, 100)->create();

        // Povoando a tabela com seeders
        // Método 1
        // $contato = new SiteContato();
        // $contato->nome = 'Sistema WT';
        // $contato->telefone = '(11) 99999-8888';
        // $contato->email = 'contato@fornecedorwt.com.br';
        // $contato->motivo_contato = '1';
        // $contato->mensagem = 'Espero que esteja funcionando';
        // $contato->save();
    }
}

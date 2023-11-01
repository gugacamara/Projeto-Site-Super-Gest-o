<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    //Método para relacionar as tabelas, um produto tem um detalhe em produto_detalhes
    public function produtoDetalhe(){
        return $this->hasOne('App\ProdutoDetalhe');
    // o método vai buscar o id do produto na tabela produto_detalhes
    }
}

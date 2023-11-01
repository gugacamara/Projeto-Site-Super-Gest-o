<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Definindo o nome da tabela associada ao model
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    //Método para relacionar as tabelas, um produto tem um detalhe em produto_detalhes
    public function itemDetalhe(){
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    // o método vai buscar o id do produto(em produto_id) na tabela produto_detalhes(no model itemDetalhe)
    }
    public function fornecedor(){
        return $this->belongsTo('App\Fornecedor');
    }
}

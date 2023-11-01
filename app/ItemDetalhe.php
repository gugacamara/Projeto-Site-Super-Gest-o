<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    // Definindo o nome da tabela associada ao model
    protected $table = 'produto_detalhes';

    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function item(){
        return $this->belongsTo('App\Item', 'produto_id', 'id');
        // O método vai buscar a fk produto_id na tabela que correspondente ao id do model Item
    }
}

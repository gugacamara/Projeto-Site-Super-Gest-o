<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos()
    {
        //return $this->belongsToMany('App\Produto', 'pedidos_produtos');
        return $this->belongsToMany('App\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('created_at', 'updated_at', 'quantidade', 'id');
    }

    // 1 - model do relacionamento N:N
    // 2 - nome da tabela auxiliar que armazena o relacionamento N:N
    // 3 - chave estrangeira do model atual na tabela auxiliar
    // 4 - chave estrangeira do model relacionado relacionado na tabela auxiliar
}

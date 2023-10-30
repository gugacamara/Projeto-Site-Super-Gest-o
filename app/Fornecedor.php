<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;
    // $table Ele sobrepoe a nomeação do eloquent, que seria fornecedors
    // $fillable serve poder criar um objeto e passar os parametros no tinker
    // e assim pode-se usar o tinker
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}

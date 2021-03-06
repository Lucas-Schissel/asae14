<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venda extends Model
{
    use SoftDeletes;

    protected $table = 'vendas';
    protected $primaryKey = 'id';

    function usuario(){
    	return $this->belongsTo('App\Cliente', 'id_usuario', 'id');
    }

    function produtos(){
        return $this->belongsToMany('App\Produto', 'produtos_venda','id_venda', 'id_produto')
        ->withPivot(['id','quantidade','subtotal'])
        ->withTimestamps();
    }

    function itens(){
        return $this->belongsToMany('App\Itens','id_venda')
        ->withPivot(['id']);
    }
}
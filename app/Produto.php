<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $primaryKey ='id';
    protected $fillable = ['id_categoria','id_unidade'];

    function vendas(){
        return $this->belongsToMany('App\Produto', 'produtos_venda','id_venda', 'id_produto')
        ->withPivot(['id','quantidade','subtotal'])
        ->withTimestamps();
    }

    function categorias(){
    	return $this->belongsTo('App\Categoria', 'id_categoria', 'id');
    }
    function unidades(){
    	return $this->belongsTo('App\Unidade', 'id_unidade', 'id');
    }
}

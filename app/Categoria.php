<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey ='id';
    protected $fillable = ['nome'];

    function produtos(){
    	return $this->hasMany('App\Produto', 'id_categoria', 'id');
    }
}

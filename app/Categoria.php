<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;

    protected $table = 'categorias';
    protected $primaryKey ='id';
    protected $fillable = ['nome'];

    function produtos(){
    	return $this->hasMany('App\Produto', 'id_categoria', 'id');
    }
}

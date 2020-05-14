<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidade extends Model
{
    use SoftDeletes;

    protected $table = 'unidades';
    protected $primaryKey ='id';
    protected $fillable = ['nome'];

    function produtos(){
    	return $this->hasMany('App\Produto', 'id_unidade', 'id');
    }
}

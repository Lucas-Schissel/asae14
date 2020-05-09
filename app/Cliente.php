<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey ='id';

    function vendas(){
    	return $this->hasMany('App\Venda', 'id_usuario', 'id');
    }
}

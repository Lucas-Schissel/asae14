<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaForeingProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_categoria')->after('nome'); 
            $table->unsignedBigInteger('id_unidade')->after('id_categoria'); 

            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreign('id_unidade')->references('id')->on('unidades');

        });
  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

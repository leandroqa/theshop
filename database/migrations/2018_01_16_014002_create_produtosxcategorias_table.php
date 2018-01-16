<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosxcategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtosxcategorias', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('produtos_id')->unsigned();
          $table->foreign('produtos_id')
                        ->references('id')
                        ->on('produtos')
                        ->onDelete('cascade');
          $table->integer('categorias_id')->unsigned();
          $table->foreign('categorias_id')
                        ->references('id')
                        ->on('categorias')
                        ->onDelete('cascade');
          $table->timestamps();
          $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtosxcategorias');
    }
}

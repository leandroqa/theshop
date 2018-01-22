<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosxpedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtosxpedidos', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('produtos_id')->unsigned();
          $table->foreign('produtos_id')
                        ->references('id')
                        ->on('produtos')
                        ->onDelete('cascade');
          $table->string('email',255);
          $table->foreign('email')
                        ->references('email')
                        ->on('users')
                        ->onUpdate('cascade');
          $table->integer('qtde')->default(0);
          $table->float('valorUnitario', 8, 2);
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
        Schema::dropIfExists('produtosxpedidos');
    }
}

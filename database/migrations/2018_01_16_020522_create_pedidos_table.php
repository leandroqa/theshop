<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',255);
            $table->foreign('email')
                          ->references('email')
                          ->on('clientes')
                          ->onDelete('cascade');
            $table->integer('cobrancas_id')->unsigned();
            $table->foreign('cobrancas_id')
                          ->references('id')
                          ->on('cobrancas')
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
        Schema::dropIfExists('pedidos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobrancasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobrancas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('clientes_id')->unsigned();
          $table->foreign('clientes_id')
                        ->references('id')
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
        Schema::dropIfExists('cobrancas');
    }
}

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
          $table->string('email',255);
          $table->foreign('email')
                        ->references('email')
                        ->on('clientes')
                        ->onDelete('cascade');
          $table->string('telefone',255);
          $table->string('celular',255)->nullable();
          $table->string('cep',8);
          $table->string('numero',10);
          $table->text('endereco');
          $table->text('complemento')->nullable();
          $table->text('referencia')->nullable();
          $table->string('bairro',255);
          $table->string('cidade',255);
          $table->string('estado',2);
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

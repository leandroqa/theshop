<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nome',255);
          $table->string('sobrenome',255);
          $table->string('email',255);
          $table->string('cpf',11);
          $table->dateTime('aniversario');
          $table->char('sexo',1);
          $table->foreign('email')
                        ->references('email')
                        ->on('users')
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
        Schema::dropIfExists('clientes');
    }
}

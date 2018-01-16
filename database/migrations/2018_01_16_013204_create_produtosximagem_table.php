<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosximagemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtosximagem', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produtos_id')->unsigned();
            $table->foreign('produtos_id')
                          ->references('id')
                          ->on('produtos')
                          ->onDelete('cascade');
            $table->string('foto',255)->nullable()->default('nopic.jpg');
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
        Schema::dropIfExists('produtosximagem');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistAvaliacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('db3')->create('hist_avaliacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('avaliacao_id')->unsigned();
            $table->string('responsavel' , 80);
            $table->foreign('avaliacao_id')
                ->references('id')
                ->on('avaliacaos')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('db3')->dropIfExists('hist_avaliacaos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistAvaliacaosTable extends Migration
{  
    public function up()
    {
        Schema::connection('db3')->create('hist_avaliacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('avaliacao_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('bdvisitantes.users')
                ->onDelete('cascade');
            $table->foreign('avaliacao_id')
                ->references('id')
                ->on('avaliacaos')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::connection('db3')->dropIfExists('hist_avaliacaos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensAvaliacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('db3')->create('itens_avaliacaos', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('descricao');
            $table->string('chk_name');
            $table->string('date_name');
            $table->string('obs_name');
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
        Schema::connection('db3')->dropIfExists('itens_avaliacaos');
    }
}

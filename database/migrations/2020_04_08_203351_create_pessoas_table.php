<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('db3')->create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome' , 100);
            $table->string('cidade' , 30);
            $table->string('estado' , 100);
            $table->string('rg', 14);
            $table->string('cpf', 15);
            $table->string('fone1', 14);
            $table->string('fone2', 14);
            $table->string('email', 150);
            $table->integer('escolaridade');
            $table->string('observacao');
            $table->string('pdf');
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
        Schema::connection('db3')->dropIfExists('pessoas');
    }
}

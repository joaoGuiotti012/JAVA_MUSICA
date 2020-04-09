<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRamaisGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('db2')->create('ramais_grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ramal');
            $table->string('desc_grupo' , 60);
            $table->string('usuario' , 60);
            $table->string('senha' , 5);
            $table->string('custo', 20);
            $table->string('ativo' , 1);
            $table->string('celular', 15);
            $table->string('observacao' , 150);
            $table->string('num_conta' , 15);
            $table->string('pin' , 20);
            $table->string('macaddress' , 20);
            $table->string('chip', 23);
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
        Schema::connection('db2')->dropIfExists('ramais_grupos');
    }
}

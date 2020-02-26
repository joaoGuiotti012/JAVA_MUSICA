<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateAgendamentoVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamento_visitas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('foto')->nullable();
            $table->integer('visitado_id')->unsigned();
            $table->foreign('visitado_id')->references('id')->on('funcionarios');
            
            $table->integer('codigo');
            $table->string('nome', 60);
            $table->string('rg' , 14);
            $table->string('empresa');

            $table->string('guardaResp', 40)->nullable();

            $table->dateTime('dataEntrada')->nullable();;
            $table->dateTime('dataSaida')->nullable();;
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
        Schema::dropIfExists('agendamento_visitas');
    }
}

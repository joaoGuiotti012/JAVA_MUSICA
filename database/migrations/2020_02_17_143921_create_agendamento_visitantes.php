<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentoVisitantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamento_visitantes', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('nome', 60);
            $table->string('email' , 100);
            $table->string('rg' , 14);
            $table->string('empresa');

            $table->string('nomeVisitado');
            $table->string('setorVisitado');

            $table->string('guardaResp', 40);

            $table->date('dataEntrada');
            $table->date('dataSaida');
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
        Schema::dropIfExists('agendamento_visitantes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentoVisitas extends Migration
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
            $table->integer('visitante_id')->unsigned();
            $table->integer('visitado_id')->unsigned();
            $table->integer('guarda_id')->unsigned()->nullable();
            $table->integer('codigo');
            $table->string('descricao' , 250);
            $table->date('dataPrevisao');
            $table->time('horarioPrevisao');
            $table->dateTime('dataEntrada')->nullable();
            $table->dateTime('dataSaida')->nullable();
            $table->timestamps();
            $table->foreign('visitante_id')
                ->references('id')
                ->on('visitantes')
                ->onDelete('cascade');
            $table->foreign('visitado_id')
                ->references('id')
                ->on('funcionarios')
                ->onDelete('cascade');
            $table->foreign('guarda_id')
                ->references('id')
                ->on('guarda');
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

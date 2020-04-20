<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('db3')->create('avaliacaos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pessoa_id')->unsigned()->unique();

            $table->string('tp', 1)->nullable();
            $table->date('date_tp')->nullable();
            $table->string( 'obs_tp')->nullable();

            $table->string('iac',1)->nullable();
            $table->date( 'date_iac')->nullable();
            $table->string('obs_iac')->nullable();

            $table->string('rs', 1)->nullable();
            $table->date('date_rs')->nullable();
            $table->string('obs_rs')->nullable();

            $table->string('ptj', 1)->nullable();
            $table->date('date_ptj')->nullable();
            $table->string('obs_ptj')->nullable();

            $table->string('rp', 1)->nullable();
            $table->date('date_rp')->nullable();
            $table->string('obs_rp')->nullable();

            $table->string('if', 1)->nullable();
            $table->date('date_if')->nullable();
            $table->string('obs_if')->nullable();

            $table->string('ic', 1)->nullable();
            $table->date('date_ic')->nullable();
            $table->string('obs_ic')->nullable();


            $table->string('ep', 1)->nullable();
            $table->date('date_ep')->nullable();
            $table->string('obs_ep')->nullable();

            $table->string('et', 1)->nullable();
            $table->date('date_et')->nullable();
            $table->string('obs_et')->nullable();

            $table->string('ex', 1)->nullable();
            $table->date('date_ex')->nullable();
            $table->string('obs_ex')->nullable();
            
            $table->string('obs_geral')->nullable();
            $table->integer('responsavel')->unsigned();

            $table->timestamps();

            $table->foreign('pessoa_id')
                  ->references('id')
                  ->on('pessoas')
                  ->onDelete('cascade');

            $table->foreign('responsavel')
                  ->references('id')
                  ->on('bdvisitantes.users');
                  //->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('db3')->dropIfExists('avaliacaos');
    }
}

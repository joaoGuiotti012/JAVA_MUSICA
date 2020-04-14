<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

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
            $table->increments('id');
            $table->string('nome' , 100);
            $table->date('data_nasc');
            $table->string('cidade' , 30);
            $table->string('estado' , 100);
            $table->string('endereco' , 100)->nullable();
            $table->integer('escolaridade');
            $table->string('rg', 14)->unique();;
            $table->string('cpf', 15)->unique();
            $table->string('nome_pai' , 100);
            $table->string('nome_mae' , 100);
            $table->string('fone1', 14);
            $table->string('fone2', 14)->nullable();
            $table->string('email', 150);
            $table->string('deficiencia', 15)->nullable();
            $table->string('pdf')->nullable();
            $table->string('cargo_concorrido' , 100)->nullable();
            $table->string('setor' , 100)->nullable();
            $table->date('data_contato')->nullable();
            $table->date('data_retorno')->nullable();
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

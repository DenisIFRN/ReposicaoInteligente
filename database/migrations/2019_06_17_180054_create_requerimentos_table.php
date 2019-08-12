<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_aluno');
            $table->string('id_disciplina');
            $table->string('id_docente');
            $table->text('justificativa');
            $table->string('anexo')->nullable();
            $table->string('data');
            $table->string('status')->default('Aguardando_Avaliacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requerimentos');
    }
}

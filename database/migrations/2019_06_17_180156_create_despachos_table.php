<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDespachosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despachos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_docente')->nullable();
            $table->string('avaliacao')->nullable();
            $table->string('observacao')->nullable();
            $table->string('local')->nullable();
            $table->string('data_aplicacao')->nullable();
            $table->string('data_avaliacao')->nullable();
            $table->unsignedInteger('id_tramite')->nullable();

            $table->foreign('id_tramite')->references('id')->on('tramites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('despachos');
    }
}

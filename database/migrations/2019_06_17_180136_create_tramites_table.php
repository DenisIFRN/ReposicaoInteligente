<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_servidor')->nullable();
            $table->string('avaliacao')->nullable();
            $table->string('observacao')->nullable();
            $table->string('data')->nullable();
            $table->unsignedInteger('id_requerimento')->nullable();

            $table->foreign('id_requerimento')->references('id')->on('requerimentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tramites');
    }
}

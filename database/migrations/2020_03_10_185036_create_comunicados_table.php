<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunicadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunicados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('conjunto_id')->nullable();
            $table->string('titulo')->nullable();
            $table->text('texto')->nullable();            
            $table->text('imagen1')->nullable();
            $table->text('imagen2')->nullable();
            $table->text('imagen3')->nullable();
            $table->text('documento1')->nullable();
            $table->text('documento2')->nullable();
            $table->text('documento3')->nullable();
            $table->enum('status', ['1', '2', '3'])->default('1')->comment('1=Activo;2=Inactivo;3=Eliminado');
            $table->integer('user_create')->nullable();
            $table->integer('user_update')->nullable();
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
        Schema::dropIfExists('comunicados');
    }
}

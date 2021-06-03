<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComerciosConjuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comercios_conjuntos', function (Blueprint $table) {
            $table->increments('id');            
            $table->unsignedBigInteger('conjunto_id');
            $table->unsignedBigInteger('comercio_id');
            $table->enum('status', ['1', '2'])->default('1')->comment('1=Activo;2=Inactivo');
            $table->integer('user_create')->nullable();
            $table->integer('user_update')->nullable();
            $table->timestamps();

            $table->foreign('conjunto_id')->references('id')->on('conjuntos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('comercio_id')->references('id')->on('comercios')->onDelete('cascade')->onUpdate('cascade');

        });      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comercios_conjuntos');
    }
}

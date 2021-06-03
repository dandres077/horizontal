<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('conjunto_id')->nullable();
            $table->string('nombre')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('orden')->nullable();
            $table->string('imagen')->nullable();
            $table->string('observacion')->nullable();
            $table->enum('ubicacion', ['1', '2'])->default('1')->comment('1=Local;2=global');
            $table->enum('status', ['1', '2'])->default('1')->comment('1=Activo;2=Inactivo');
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
        Schema::dropIfExists('vinculos');
    }
}

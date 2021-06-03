<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetrosBienesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metros_bienes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('conjunto_id')->nullable();
            $table->string('nombre')->nullable();
            $table->string('metros')->nullable();
            $table->string('observacion')->nullable();
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
        Schema::dropIfExists('metros_bienes');
    }
}

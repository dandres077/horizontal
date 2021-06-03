<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParqueaderosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parqueaderos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('conjunto_id')->nullable();
            $table->integer('tipo_id')->nullable();
            $table->string('nombre')->nullable();
            $table->string('observacion')->nullable();
            $table->enum('status', ['1', '2'])->default('1')->comment('1=Disponible;2=No disponible');
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
        Schema::dropIfExists('parqueaderos');
    }
}

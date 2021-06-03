<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConjuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conjuntos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->string('nit')->unique();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->text('imagen')->nullable();
            $table->integer('pais_id')->nullable(); 
            $table->integer('dpto_id')->nullable(); 
            $table->integer('ciudad_id')->nullable();            
            $table->string('localidad')->nullable();
            $table->string('barrio')->nullable();
            $table->integer('estratos_id')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('n_torres')->nullable();
            $table->integer('n_aptos')->nullable();
            $table->integer('n_parqueaderov')->nullable();
            $table->integer('n_parqueaderom')->nullable();
            $table->integer('m_parqueaderob')->nullable();
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
        Schema::dropIfExists('conjuntos');
    }
}

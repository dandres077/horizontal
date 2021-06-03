<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last');
            $table->integer('tipo_identificacion');
            $table->integer('n_identificacion');
            $table->integer('genero_id');
            $table->string('email')->unique();            
            $table->string('imagen');
            $table->enum('status', ['1', '2', '3'])->default('1')->comment('1=Activo;2=Inactivo; 3=Eliminado');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

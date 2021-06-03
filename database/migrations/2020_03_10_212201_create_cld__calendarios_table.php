<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCldCalendariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cld__calendarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha')->nullable();
            $table->integer('mss_ano')->nullable();
            $table->integer('mss_mes')->nullable();
            $table->integer('cld_esfuerzo_dia')->nullable();
            $table->integer('cld_habil')->nullable();
            $table->string('cld_nombre_dia')->nullable();
            $table->integer('cld_semana')->nullable();
            $table->integer('cld_sem_mes')->nullable();
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
        Schema::dropIfExists('cld__calendarios');
    }
}

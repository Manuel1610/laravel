<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Practicantes', function (Blueprint $table) {
            $table->id();
            $table->String('Nombres');
            $table->String('Apellidos');
            $table->bigInteger('DNI');
            $table->Boolean('Turno');
            $table->String ('Inicio');
            $table->String('Fin');
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
        Schema::dropIfExists('practicantes');
    }
}

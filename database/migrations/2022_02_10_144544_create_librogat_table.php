<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrogatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('librogat', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('documento');
            $table->bigInteger('folio_entrada');
            $table->string('procedencia');
            $table->string('asunto');
            $table->string('encargado');
            $table->string('proveido');
            $table->bigInteger('folio_salida');
            $table->date('fechaentrega');
            $table->String('cargo');
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
        Schema::dropIfExists('librogat');
    }
}

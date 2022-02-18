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
            $table->bigInteger('phone');
            $table->string('area');
            $table->string('problema');
            $table->string('responsablearea');
            $table->string('responsablesoporte');
            $table->string('codigopatrimonial');
            $table->date('fechaentrega');
            $table->String('salida');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;
class CreateNominasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominas', function (Blueprint $table) {
            $table->id();
            $table->string('semana',2);
            $table->string('percepcion');
            $table->string('deduccion');
            $table->string('documento')->nullable();
            $table->foreignId('empleado_id')->constrained();
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
        Schema::dropIfExists('nominas');
    }
}

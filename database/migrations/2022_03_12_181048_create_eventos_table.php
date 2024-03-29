<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 20);
            $table->float('monto')->nullable();
            $table->string('nota', 50)->nullable();

            $table->unsignedBigInteger('entrenador_id');
            $table->foreign('entrenador_id')
                ->references('id')
                ->on('entrenadors')
                ->onDelete('cascade');

            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}

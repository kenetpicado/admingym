<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();

            $table->enum('servicio', ['PESAS', 'SPINNING', 'ZUMBA', 'TAEKWONDO']);
            $table->enum('plan', ['MENSUAL', 'QUINCENAL', 'SEMANAL', 'DIA']);
            $table->float('monto'); 
            $table->float('beca')->default(0); 
            $table->string('nota', 30)->nullable();
            $table->date('fecha_fin');
            
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

            $table->date('created_at')->default(date('Y-m-d'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cajas');
    }
}

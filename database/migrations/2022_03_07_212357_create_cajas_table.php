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
            $table->string('nombre', 50);

            $table->enum('servicio', ['PESAS', 'SPINNING', 'ZUMBA', 'TAEKWONDO']);
            $table->enum('plan', ['MENSUAL', 'QUINCENAL', 'SEMANAL', 'DIA']);
            $table->string('monto', 4); //PRECIO
            $table->string('beca', 3)->default('0'); //PORCENTAJE
            $table->string('nota', 50)->nullable(); //PORCENTAJE
            $table->date('fecha_inicio')->default(date('Y-m-d')); //FECHA EN QUE SE PAGA
            $table->date('fecha_fin'); //FECHA EN QUE EXPIRA
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');

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
        Schema::dropIfExists('cajas');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();;
            $table->string('apellido_p')->nullable();
            $table->string('apellido_m')->nullable();
            $table->string('genero')->nullable();
            $table->string('correo')->nullable();            
            $table->string('rfc')->nullable();
            $table->string('telefono')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('num_personal')->nullable();
            $table->string('delegacion')->nullable();
            $table->string('zona_e')->nullable();
            $table->string('clave_ct')->nullable();    
            $table->boolean('confirmado')->default(0);
            $table->string('codigo_confirmacion')->nullable();     
            $table->string('agremiado',128)->nullable();
            $table->string('delegacion2',128)->nullable();

            $table->integer('taller_id')->unsigned()->nullable();
            $table->foreign('taller_id')->references('id')->on('tallers');            

            $table->integer('delegacion_id')->unsigned()->nullable();
            $table->foreign('delegacion_id')->references('id')->on('delegacions');                        

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
        Schema::dropIfExists('usuarios');
    }
}

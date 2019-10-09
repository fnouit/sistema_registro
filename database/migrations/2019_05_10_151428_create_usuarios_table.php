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
            #Datos Personales
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

            #Datos Laborales
            $table->string('num_personal')->nullable();
            $table->integer('delegacion_id')->unsigned()->nullable();
            $table->string('delegacion')->nullable();
            $table->string('delegacion_opc')->nullable();
            $table->string('zona_e')->nullable();
            $table->string('clave_ct')->nullable();    
            $table->string('codigo_confirmacion')->nullable();     

            #Datos de Ruta
            $table->string('slug')->unique();

            #Llaves Foraneas
            $table->foreign('delegacion_id')->references('id')->on('delegacions');                        

            $table->softDeletes();
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDelegacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delegacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nomenclatura_id')->unsigned();
            $table->integer('numero');
            $table->string('sede', 128);
            $table->unsignedInteger('nivel_id');
            $table->integer('region_id')->unsigned();            
            $table->string('delegacion');
            $table->string('slug')->unique();            

            #Llaves Foraneas
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('nomenclatura_id')->references('id')->on('nomenclaturas');            
            $table->foreign('nivel_id')->references('id')->on('nivels'); 

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
        Schema::dropIfExists('delegacions');
    }
}

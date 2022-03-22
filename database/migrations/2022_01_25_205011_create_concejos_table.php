<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcejosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concejos', function (Blueprint $table) {
            $table->id();

            $table->string('tp_doc');
            $table->string('num_doc');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('direc');
            $table->string('tele');
            $table->string('email');

            $table->foreignId('id_directiva')->constrained('directivas');
           
            $table->foreignId('id_secretaria')->constrained('secretarias');
          
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
        Schema::dropIfExists('concejos');
    }
}

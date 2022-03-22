<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actas', function (Blueprint $table) {
            $table->id();

            $table->string('sesion_ord');
            $table->string('sesion_ext');
            $table->string('actas_posesion');
            $table->string('asistencia');
            $table->string('informes');
            $table->date('fecha');
            $table->char('edo,1');

          
        
            $table->foreignId('id_concejo')->constrained('concejos');
            $table->foreignId('id_circular')->constrained('circulars');

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
        Schema::dropIfExists('actas');
    }
}

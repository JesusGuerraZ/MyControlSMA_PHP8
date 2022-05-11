<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOserviciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oservicios', function (Blueprint $table) {
            $table->id();

            $table->date('fec_reg_oservicio');
            $table->string('num_oservicio');
            $table->integer('id_beneficiario');
            $table->string('ident_prestador');
            $table->date('fec_cita_oservicio');
            $table->string('pdf_oservicio');
            $table->string('est_oservicio');

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
        Schema::dropIfExists('oservicios');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();

            $table->string('num_contrato', 25);
            $table->string('obj_contrato', 255);
            $table->string('prest_contrato', 45);
            $table->integer('ident_contrato');
            $table->string('tipo_contrato', 11);
            $table->string('servi_contrato', 11);
            $table->date('fec_susc_contrato');
            $table->date('fec_ini_contrato');
            $table->date('fec_ter_contrato');
            $table->string('vig_contrato', 2);
            $table->biginteger('val_contrato');
            $table->integer('reg_contrato');
            $table->date('fecha_reg_contrato');
            $table->string('mod_contrato', 2);
            $table->biginteger('val_mod_contrato');
            $table->biginteger('val_act_contrato');
            $table->string('obli_contrato', 255);
            $table->string('est_contrato');

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
        Schema::dropIfExists('contratos');
    }
}

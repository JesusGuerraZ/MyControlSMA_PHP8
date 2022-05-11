<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturadors', function (Blueprint $table) {
            $table->id();

            $table->integer('id_oservicio');
            $table->date('fec_reg_factura');
            $table->date('fec_factura');
            $table->biginteger('valor_factura');
            $table->string('pdf_facturacion', 256);
            $table->string('aprobada_facturacion', 15);
            $table->string('obs_facturacion', 256);

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
        Schema::dropIfExists('facturadors');
    }
}

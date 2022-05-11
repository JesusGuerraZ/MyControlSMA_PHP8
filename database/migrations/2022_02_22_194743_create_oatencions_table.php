<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOatencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oatencions', function (Blueprint $table) {
            $table->id();

            $table->integer('id_oservicio');
            $table->date('fec_oatencion');
            $table->integer('num_oatencion');
            $table->string('est_oatencion');
            $table->string('pdf_oatencion');


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
        Schema::dropIfExists('oatencions');
    }
}

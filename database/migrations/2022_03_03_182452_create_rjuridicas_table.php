<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRjuridicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rjuridicas', function (Blueprint $table) {
            $table->id();

            $table->string('pdf_fac_rjuridica', 100);
            $table->string('pdf_firmas_rjuridica', 100);
            $table->string('est_rjuridica', 20);
            $table->string('obs_rjuridica', 255);

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
        Schema::dropIfExists('rjuridicas');
    }
}

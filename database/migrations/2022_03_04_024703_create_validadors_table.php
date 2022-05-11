<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validadors', function (Blueprint $table) {
            $table->id();

            $table->string('pdf_fac_validador', 100);
            $table->string('pdf_firmas_validador', 100);
            $table->string('est_validador', 20);
            $table->string('obs_validador', 255);

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
        Schema::dropIfExists('validadors');
    }
}

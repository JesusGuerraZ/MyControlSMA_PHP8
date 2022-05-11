<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            $table->id();

             $table->string('pdf_fac_supervisor');
             $table->string('est_supervisor');
             $table->integer('firma_oserv_supervisor');
             $table->integer('firma_oaten_supervisor');
             $table->integer('firma_aud_supervisor');
             $table->string('obs_supervisor');


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
        Schema::dropIfExists('supervisors');
    }
}

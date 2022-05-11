<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();

            $table->integer('ced_beneficiario');
            $table->string('nom_beneficiario', 45);
            $table->string('ape_beneficiario', 45);
            $table->string('dir_beneficiario', 45);
            $table->string('gen_beneficiario', 1);
            $table->integer('id_parentesco');
            $table->date('fec_nac_beneficiario');
            $table->integer('edad_beneficiario');
            $table->bigInteger('tel_beneficiario');
            $table->integer('id_funcionario');

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
        Schema::dropIfExists('beneficiarios');
    }
}

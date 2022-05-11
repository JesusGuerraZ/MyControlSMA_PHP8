<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beneficiarios extends Model
{
    use HasFactory;
    protected $fillable = ['ced_beneficiario', 'nom_beneficiario', 'ape_beneficiario', 'dir_beneficiario', 'gen_beneficiario', 'id_parentesco', 'fec_nac_beneficiario', 'edad_beneficiario', 'tel_beneficiario', 'nom_funcionario'];
}

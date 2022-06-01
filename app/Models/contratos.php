<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contratos extends Model
{
    use HasFactory;
    protected $fillable = ['num_contrato', 'obj_contrato', 'prest_contrato', 'ident_contrato', 'tipo_contrato', 'servi_contrato', 'fec_susc_contrato', 'fec_ini_contrato', 'fec_ter_contrato', 'vig_contrato', 'val_contrato', 'reg_contrato', 'fecha_reg_contrato', 'mod_contrato', 'val_mod_contrato', 'val_act_contrato', 'obli_contrato', 'est_contrato', 'natu_contrato'];
}

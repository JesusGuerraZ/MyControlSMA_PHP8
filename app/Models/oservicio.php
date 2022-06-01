<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oservicio extends Model
{
    use HasFactory;
    protected $fillable = ['fec_reg_oservicio', 'num_oservicio', 'id_beneficiario', 'ident_prestador', 'fec_cita_oservicio', 'pdf_oservicio', 'est_oservicio', 'val_oservicio'];


}

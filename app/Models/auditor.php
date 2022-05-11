<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auditor extends Model
{
    use HasFactory;
    protected $fillable = ['id_oservicio', 'id_facturacion', 'aprobada_auditoria', 'fec_apr_auditoria', 'obs_auditoria'];
}

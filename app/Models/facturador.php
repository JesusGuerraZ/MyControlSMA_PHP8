<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facturador extends Model
{
    use HasFactory;
    protected $fillable = ['id_oservicio', 'fec_reg_factura', 'fec_factura', 'valor_factura', 'pdf_facturacion', 'aprobada_facturacion', 'obs_facturacion'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oatencion extends Model
{
    use HasFactory;
    protected $fillable = ['id_oservicio', 'fec_oatencion', 'num_oatencion', 'est_oatencion', 'pdf_oatencion'];

}

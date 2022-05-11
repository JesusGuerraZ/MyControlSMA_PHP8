<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class validador extends Model
{
    use HasFactory;
    protected $fillable = ['pdf_fac_validador', 'pdf_firmas_validador', 'est_validador', 'obs_validador'];
}

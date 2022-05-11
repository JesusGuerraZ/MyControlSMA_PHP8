<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rjuridica extends Model
{
    use HasFactory;
    protected $fillable = ['pdf_fac_rjuridica', 'pdf_firmas_rjuridica', 'est_rjuridica', 'obs_rjuridica'];
}

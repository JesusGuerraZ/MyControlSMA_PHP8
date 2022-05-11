<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supervisor extends Model
{
    use HasFactory;
    protected $fillable = ['pdf_fac_supervisor', 'est_supervisor', 'firma_oserv_supervisor', 'firma_oaten_supervisor', 'firma_aud_supervisor', 'obs_supervisor'];
}

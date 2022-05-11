<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funcionarios extends Model
{
    use HasFactory;
    protected $fillable = ['ced_funcionario', 'nom_ape_funcionario', 'tel_funcionario', 'cel_funcionario', 'nom_regional'];
}

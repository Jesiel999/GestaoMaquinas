<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = "departamento";
    
    protected $primaryKey = "depa_codigo";

    public $timestamps = false;

    protected $fillable = [
        "depa_nome",
    ];
}

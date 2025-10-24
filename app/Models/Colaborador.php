<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $table = "colaborador";
    
    protected $primaryKey = "cola_codigo";

    public $timestamps = false;

    protected $fillable = [
        "cola_nome",
        "cola_cpf",
        "cola_telefone",
        "cola_email",
        "cola_departamento",
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'cola_departamento', 'depa_codigo');
    }
}

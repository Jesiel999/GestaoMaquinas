<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    protected $table = "maquina";

    protected $primaryKey = "maqu_codigo";

    public $timestamps = false;

    protected $fillable = [
        'maqu_nome',
        'maqu_iplocal',
        'maqu_ippulico',
        'maqu_so',
        'maqu_versaoso',
        'maqu_arquitetura',
        'maqu_processador',
        'maqu_cores',
        'maqu_threads',
        'maqu_ram',
        'maqu_usocpu',
        'maqu_usoram',
        'maqu_coleta',
        'maqu_responsavel',
        'maqu_marca',
        'maqu_modelo',      
        ];

}

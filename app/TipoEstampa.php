<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEstampa extends Model
{
    protected $connection = 'mysql';
    protected $table = 'tipo_estampa';
    protected $primaryKey = "id";
    //protected $dates = ['data_hora_acompanhamento', 'data_hora_acompanhado'];
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteTipo extends Model
{
    protected $connection = 'mysql';
    protected $table = 'cliente_tipo';
    protected $primaryKey = "id";
    //protected $dates = ['data_orcamento','data_atualizacao'];
    public $timestamps = false;

}

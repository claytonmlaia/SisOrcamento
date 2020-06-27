<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
    protected $connection = 'mysql';
    protected $table = 'situacao';
    protected $primaryKey = "id";
    //protected $dates = ['data_orcamento','data_atualizacao'];
    public $timestamps = false;

}

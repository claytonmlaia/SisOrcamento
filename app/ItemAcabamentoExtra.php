<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemAcabamentoExtra extends Model
{
    protected $connection = 'mysql';
    protected $table = 'item_acabamento_extra';
    protected $primaryKey = "id";
    //protected $dates = ['data_hora_acompanhamento', 'data_hora_acompanhado'];
    public $timestamps = false;
}

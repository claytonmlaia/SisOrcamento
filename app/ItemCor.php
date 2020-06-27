<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCor extends Model
{
    protected $connection = 'mysql';
    protected $table = 'item_cor';
    protected $primaryKey = "id";
    //protected $dates = ['data_hora_acompanhamento', 'data_hora_acompanhado'];
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemTipo extends Model
{
    protected $connection = 'mysql';
    protected $table = 'item_tipo';
    protected $primaryKey = "id";
    //protected $dates = ['data_hora_acompanhamento', 'data_hora_acompanhado'];
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemMalha extends Model
{
    protected $connection = 'mysql';
    protected $table = 'item_malha';
    protected $primaryKey = "id";
    //protected $dates = ['data_hora_acompanhamento', 'data_hora_acompanhado'];
    public $timestamps = false;
}

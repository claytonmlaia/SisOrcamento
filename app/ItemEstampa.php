<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemEstampa extends Model
{
    protected $connection = 'mysql';
    protected $table = 'item_estampa';
    protected $primaryKey = "id";
    //protected $dates = ['data_hora_acompanhamento', 'data_hora_acompanhado'];
    public $timestamps = false;

    //AQUI SERÃO REALIZADOS OS JOINS DA CONSULTA (JOINS FEITOS COM OUTRAS MODELS)
    public function tipoEstampa()
    {
        return $this->belongsTo('App\TipoEstampa','tipo_estampa_id','id')->withDefault();
    }
    public function item()
    {
        return $this->belongsTo('App\Item','item_id','id')->withDefault();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $connection = 'mysql';
    protected $table = 'agenda';
    protected $primaryKey = "id";
    protected $dates = ['dada_acompanhamento'];
    public $timestamps = false;

    //AQUI SERÃO REALIZADOS OS JOINS DA CONSULTA (JOINS FEITOS COM OUTRAS MODELS)
    public function orcamento()
    {
        return $this->belongsTo('App\Orcamento','orcamento_id','id')->withDefault();
    }
}

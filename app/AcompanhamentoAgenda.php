<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcompanhamentoAgenda extends Model
{
    protected $connection = 'mysql';
    protected $table = 'acompanhamento_agenda';
    protected $primaryKey = "id";
    protected $dates = ['data_hora_acompanhamento', 'data_hora_acompanhado'];
    public $timestamps = false;

    //AQUI SERÃO REALIZADOS OS JOINS DA CONSULTA (JOINS FEITOS COM OUTRAS MODELS)
    public function agenda()
    {
        return $this->belongsTo('App\Agenda','agenda_id','id')->withDefault();
    }

}

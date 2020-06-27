<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $connection = 'mysql';
    protected $table = 'clientes';
    protected $primaryKey = "id";
    //protected $dates = ['data_orcamento','data_atualizacao'];
    public $timestamps = false;

    //AQUI SERÃO REALIZADOS OS JOINS DA CONSULTA (JOINS FEITOS COM OUTRAS MODELS)
    public function tipocliente()
    {
        return $this->belongsTo('App\ClienteTipo','cliente_tipo_id','id')->withDefault();
    }
}

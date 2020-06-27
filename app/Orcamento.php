<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    protected $connection = 'mysql';
    protected $table = 'orcamento';
    protected $primaryKey = "id";
    protected $dates = ['data_orcamento','data_atualizacao'];
    public $timestamps = false;

    //AQUI SERÃO REALIZADOS OS JOINS DA CONSULTA (JOINS FEITOS COM OUTRAS MODELS)
    public function clientes()
    {
        return $this->belongsTo('App\Clientes','clientes_id','id')->withDefault();
    }
    public function usuarios()
    {
        return $this->belongsTo('App\User','users_id','id')->withDefault();
    }
    public function situacao()
    {
        return $this->belongsTo('App\Situacao','situacao_id','id')->withDefault();
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $connection = 'mysql';
    protected $table = 'item';
    protected $primaryKey = "id";
    //protected $dates = ['data_hora_acompanhamento', 'data_hora_acompanhado'];
    public $timestamps = false;

    //AQUI SERÃO REALIZADOS OS JOINS DA CONSULTA (JOINS FEITOS COM OUTRAS MODELS)
    public function orcamento()
    {
        return $this->belongsTo('App\Orcamento','orcamento_id','id')->withDefault();
    }
    public function malhaitem()
    {
        return $this->belongsTo('App\ItemMalha','malha_id','id')->withDefault();
    }
    public function coritem()
    {
        return $this->belongsTo('App\ItemCor','cor_id','id')->withDefault();
    }
    public function tipoitem()
    {
        return $this->belongsTo('App\ItemTipo','item_tipo_id','id')->withDefault();
    }
    public function acabamentoextraitem()
    {
        return $this->belongsTo('App\ItemAcabamentoExtra','acabamento_extra_id','id')->withDefault();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agendamentoVisita extends Model
{
    protected $guarder = [];

    public function agendamentovisita()
    {
        return $this->belongsTo('App\agendamentoVisita');
    }
}

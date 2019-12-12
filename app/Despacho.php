<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    public $timestamps = false;

    protected $fillable = ['id_docente', 'avaliacao', 'observacao', 'local', 'data_aplicacao', 'data_avaliacao', 'id_tramite'];

    public function tramite()
    {
    	return $this->belongsTo(Tramite::class, 'id_tramite');
    }
}

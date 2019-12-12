<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    public $timestamps = false;

    protected $fillable = ['id_servidor', 'avaliacao','observacao', 'data', 'id_requerimento'];

    public function requerimento()
    {
    	return $this->belongsTo(Requerimento::class, 'id_requerimento');
    }

    public function despacho()
    {
    	return $this->hasMany(Despacho::class, 'id_tramite');
    }
}

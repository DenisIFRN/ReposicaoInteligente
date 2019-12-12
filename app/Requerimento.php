<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requerimento extends Model
{
	protected $fillable = ['justificativa', 'anexo'];

    public $timestamps = false;

    public function tramite()
    {
    	return $this->hasMany(Tramite::class, 'id_requerimento');
    }
}

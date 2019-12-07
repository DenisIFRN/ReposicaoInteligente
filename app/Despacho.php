<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    public $timestamps = false;

    public function tramite()
    {
    	return $this->belongsTo(Tramite::class, 'id_tramite');
    }
}

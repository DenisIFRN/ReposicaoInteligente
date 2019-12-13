<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download($anexo){
    	return Storage::download('anexos/'.$anexo);
    }
}

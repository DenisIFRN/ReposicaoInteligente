<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download($anexo){
    	return response()->download('storage/anexos/'.$anexo);
    }
}

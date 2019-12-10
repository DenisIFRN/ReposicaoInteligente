<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download($anexo){
    	return response()->download('ec2-174-129-255-76.compute-1.amazonaws.com/storage/anexos/'.$anexo);
    }
}

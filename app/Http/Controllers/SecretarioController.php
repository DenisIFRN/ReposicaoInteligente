<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SecretarioController extends Controller
{
    public function indexSecretario(){

    	if(Session::has('user')) {
            $sessao = Session::get('user');
        }else{
            return redirect()->to(route('loginForm'));
        }

        include 'CredenciaisServidor.php';
        
		return view('Paginas.Secretario.index', ['id'=>$id, 'nome'=>$nome, 'matricula'=>$matricula,'foto'=>$foto]);
    }
}

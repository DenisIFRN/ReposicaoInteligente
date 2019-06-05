<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Ivmelo\SUAP\SUAP;

class MostrarController extends Controller
{
    public function mostrar(){
		if (Session::has('user')) {
			$lala = Session::get('user');

			$teste = new Suap;

			$res = $teste->autenticar($lala['0'], $lala['1']);

			$meusDados = $teste->getMeusDados();

			$nome = $meusDados["nome_usual"];
			$matricula = $meusDados["matricula"];
			$email = $meusDados["email"];

    		return view('mostrar', ['nome'=>$nome, 'matricula'=>$matricula, 'email'=>$email]);
    	}else{
    		return redirect()->to(route('loginForm'));
    	}
    }
}

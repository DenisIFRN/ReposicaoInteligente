<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Romerito\Suap\SuapClient;

class ProfessorController extends Controller
{
    public function indexProfessor(){

    	if(Session::has('user')) {
            $sessao = Session::get('user');
        }else{
            return redirect()->to(route('loginForm'));
        }

        $authClient = new SuapClient;

	    $res = $authClient->auth($sessao['0'], $sessao['1']);

	    $dadosServidor = $authClient->get("/minhas-informacoes/meus-dados/");

    	//$authClient = new SuapClient;

    	//$res = $authClient->auth($sessao['0'], $sessao['1']);

    	//$dadosProfessor = $authClient->get("/minhas-informacoes/meus-dados/");

    	//var_dump($dadosProfessor);

    	//include 'CredenciaisServidor.php';

    	//return view('Paginas.Professor.index', ['id'=>$id, 'nome'=>$nome, 'matricula'=>$matricula,'foto'=>$foto]);

    	var_dump($dadosServidor);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Ivmelo\SUAP\SUAP;

class AlunoController extends Controller
{
    public function indexAluno(){
    	if (Session::has('user')) {
			$sessao = Session::get('user');

			$authSuap = new Suap;

			$res = $authSuap->autenticar($sessao['0'], $sessao['1']);

			$meusDados = $authSuap->getMeusDados();

			$id = $meusDados["id"];
			$nome = $meusDados["nome_usual"];
			$matricula = $meusDados["matricula"];

			$periodoLetivo = $authSuap->getMeusPeriodosLetivos();
			$periodos = end($periodoLetivo);
			$ano = $periodos["ano_letivo"];
			$periodo = $periodos["periodo_letivo"];


			$turmasVirtuais = $authSuap->getTurmasVirtuais(2019, 1);//($ano, $periodo);
			
			$detalheTurmas = $authSuap->getTurmaVirtual(57409);

	    	//return $turmasVirtuais;
			return $detalheTurmas;
	    	//view('Paginas.Aluno.index', ['nome'=>$nome, 'matricula'=>$matricula, 'turmasVirtuais' =>$turmasVirtuais]);
    	}else{
    		return redirect()->to(route('loginForm'));
    	}
    }
}
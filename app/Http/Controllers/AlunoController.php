<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Ivmelo\SUAP\SUAP;
use App\Requerimento;

class AlunoController extends Controller{
    public function indexAluno(){
		$sessao = Session::get('user');

		$authSuap = new Suap;

		$res = $authSuap->autenticar($sessao['0'], $sessao['1']);

		$dadosAluno = $authSuap->getMeusDados();
        
		$id = $dadosAluno["id"];
		$nome = $dadosAluno["nome_usual"];
		$matricula = $dadosAluno["matricula"];

		$periodoLetivo = $authSuap->getMeusPeriodosLetivos();
		$periodos = end($periodoLetivo);
		$ano = $periodos["ano_letivo"];
		$periodo = $periodos["periodo_letivo"];

		$turmasVirtuais = $authSuap->getTurmasVirtuais(2019, 1);//($ano, $periodo); $detalheTurmas = $authSuap->getTurmaVirtual($turmasVirtuais[0]['id']);
	
        //return $turmasVirtuais;
		return view('Paginas.Aluno.index', ['id'=>$id, 'nome'=>$nome, 'matricula'=>$matricula, 'turmasVirtuais' =>$turmasVirtuais]);
    }

    public function salvar(Request $request){
    	$req = new Requerimento;
    	$req->id_aluno = $request->id_aluno;
    	$req->id_disciplina = $request->disciplina;
    	$req->id_docente = "1";
    	$req->justificativa = $request->justificativa;
    	$req->anexo = $request->anexo;
    	$req->data = "24/07/2019";
    	$req->status = "Avaliando";

    	$req->save();
    	return "Deu certo";
    }
}
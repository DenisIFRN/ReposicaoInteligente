<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Requerimento;

class AlunoController extends Controller{
    public function indexAluno(){
        $sessao = Session::get('user');

        include 'credenciais.php';

		return view('Paginas.Aluno.index', ['id'=>$id, 'nome'=>$nome, 'matricula'=>$matricula,'foto'=>$foto]);
    }

    public function novaSolicitacao(){

        $sessao = Session::get('user');

        include 'credenciais.php';
        
        $periodoLetivo = $authSuap->getMeusPeriodosLetivos();
        $periodos = end($periodoLetivo);
        $ano = $periodos["ano_letivo"];
        $periodo = $periodos["periodo_letivo"];

        $turmasVirtuais = $authSuap->getTurmasVirtuais(2019, 1);//($ano, $periodo); $detalheTurmas = $authSuap->getTurmaVirtual(57409);
    
        //return $detalheTurmas;
        return view('Paginas.Aluno.solicitacao', ['id'=>$id, 'nome'=>$nome, 'matricula'=>$matricula, 'turmasVirtuais' =>$turmasVirtuais, 'foto'=>$foto]);
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
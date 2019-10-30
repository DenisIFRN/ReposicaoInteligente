<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Requerimento;

class AlunoController extends Controller{
    //function index
    public function indexAluno(){

        if(Session::has('user')) {
            $sessao = Session::get('user');
        }else{
            return redirect()->to(route('loginForm'));
        }

        include 'CredenciaisAluno.php';

        $requerimentos = Requerimento::get();

		return view('Paginas.Aluno.index', ['id'=>$id, 'nome'=>$nome, 'matricula'=>$matricula,'foto'=>$foto, 'vinculo'=>$vinculo, 'requerimentos' => $requerimentos]);
    }

    //function create
    public function novaSolicitacao(){ 

        if(Session::has('user')) {
            $sessao = Session::get('user');
        }else{
            return redirect()->to(route('loginForm'));
        }

        include 'CredenciaisAluno.php';
        
        $periodoLetivo = $authSuap->getMeusPeriodosLetivos();
        $periodos = end($periodoLetivo);
        $ano = $periodos["ano_letivo"];
        $periodo = $periodos["periodo_letivo"];

        $turmasVirtuais = $authSuap->getTurmasVirtuais(2019, 1);//($ano, $periodo); 

        //$detalheTurmas = $authSuap->getTurmaVirtual(57409);

        //$professores =  $detalheTurmas["professores"];

       //$lastProf = end($professores);

        //$matriculaDocente = $lastProf["matricula"];

        return view('Paginas.Aluno.solicitacao', ['id'=>$id, 'nome'=>$nome, 'matricula'=>$matricula, 'turmasVirtuais' =>$turmasVirtuais, 'foto'=>$foto, 'vinculo'=>$vinculo]);
    }

    public function salvar(Request $request){ //function store
    	   
        $tipoArquivo = $request->anexo->getMimeType();

        if($tipoArquivo == 'application/pdf'){

            $anexoName = uniqid(date('HisYmd')).".".$request->anexo->extension();

        }else{
            return "Arquivo Inválido"; //Criar modal com essa informação
        }

        $req = new Requerimento;
    	$req->id_aluno = $request->id_aluno;
    	$req->id_disciplina = $request->disciplina;
    	$req->id_docente = "1";
        $req->foto = $request->foto;
    	$req->justificativa = $request->justificativa;
    	$req->anexo = $anexoName;
    	$req->data = date("d/m/Y");
    	$req->status = "Aguardando avaliação";

    	$req->save();

        return redirect()->to(route('indexAluno'));
    }

    public function editar($id){ //function edit

        $req = Requerimento::find($id);
        return view('Aluno.index', ['$req' => $req]);
    }

    public function update(Request $request, $id){ //function update


        $this->validate($request, [
            'anexo' => 'required',
            'justificativa' => 'required'
        ]);
        $req = Requerimento::find($id);
        $req->anexo = $request->get('anexo');
        $req->justificativa = $request->get('justificativa');
        $req->save();
        return "deu certo";
    }
}

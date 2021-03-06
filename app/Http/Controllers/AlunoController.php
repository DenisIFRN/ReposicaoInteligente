<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Requerimento;
use App\Tramite;
use App\Despacho;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('user')) {
            $sessao = Session::get('user');
            /* if($sessao['2'] != 'Aluno'){
                return redirect()->to(route('loginForm'));
            } */
        }else{
            return redirect()->to(route('loginForm'));
        }

        include 'CredenciaisAluno.php';

        $requerimentos = Requerimento::get()->where('id_aluno', $id);

        $despachos = Despacho::get();

        $nDespachos = count($despachos);
        
        return view('Paginas.Aluno.index', ['id'=>$id, 'nome'=>$nome, 'matricula'=>$matricula,'foto'=>$foto, 'vinculo'=>$vinculo, 'requerimentos' => $requerimentos, 'despachos' => $despachos, 'nDespachos' => $nDespachos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::has('user')) {
            $sessao = Session::get('user');
            /* if($sessao['2'] != 'Aluno'){
                return redirect()->to(route('loginForm'));
            } */
        }else{
            return redirect()->to(route('loginForm'));
        }

        include 'CredenciaisAluno.php';
        
        $periodoLetivo = $authSuap->getMeusPeriodosLetivos();
        $periodos = end($periodoLetivo);
        $ano = $periodos["ano_letivo"];
        $periodo = $periodos["periodo_letivo"];

        $turmasVirtuais = $authSuap->getTurmasVirtuais(2018, 1);//($ano, $periodo); 

        $arrayTurmas = array();
        $contTurmas = count($turmasVirtuais);
        for($i = 0; $i < $contTurmas; $i++){
            $nomeTurma = $turmasVirtuais[$i]['descricao'];
            $idTurma = $turmasVirtuais[$i]['id'];
            $detalheTurmas = $authSuap->getTurmaVirtual($idTurma);
            $idProfessor = $detalheTurmas['professores'][0]['matricula'];
            array_push($arrayTurmas, array($nomeTurma, $idTurma, $idProfessor));
        }
        
        return view('Paginas.Aluno.solicitacao', ['id'=>$id, 'nome'=>$nome, 'matricula'=>$matricula, 'arrayTurmas' =>$arrayTurmas, 'foto'=>$foto, 'vinculo'=>$vinculo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turmas = $request->arrayTurmas;
        $idDisciplina = $request->disciplina;

        foreach ($turmas as $turma) {
            if($turma['1'] == $idDisciplina){
                $nomeDisciplina = $turma['0'];
                $idDocente = $turma['2'];
            }
        }

        $anexo = $request->anexo;
        $tipoArquivo = $request->anexo->getMimeType();


        if($tipoArquivo == 'application/pdf'){

            $anexoName = uniqid(date('HisYmd')).".".$request->anexo->extension();

            $anex = Storage::putFileAs('anexos', new File($anexo), $anexoName);
            
        }else{
            return "Arquivo Inválido"; //Criar modal com essa informação
        }

        $req = new Requerimento;
        $req->id_aluno = $request->id;
        $req->id_disciplina = $request->disciplina;
        $req->id_docente = $idDocente;
        $req->foto = $request->foto;
        $req->justificativa = $request->justificativa;
        $req->anexo = $anexoName;
        $req->data = date("d/m/Y");

        $req->save();

        $tram = new Tramite;
        $tram->avaliacao = "Aguardando avaliação";

        $tram->save();

        $desp = new Despacho;
        $desp->avaliacao = "Aguardando avaliação";

        $desp->save();

        return redirect()->to(route('aluno.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $anexo = $request->anexo;
        $tipoArquivo = $request->anexo->getMimeType();


        if($tipoArquivo == 'application/pdf'){

            $anexoName = uniqid(date('HisYmd')).".".$request->anexo->extension();

            $anex = Storage::putFileAs('anexos', new File($anexo), $anexoName);
            
        }else{
            return "Arquivo Inválido"; //Criar modal com essa informação
        }

        $just = $request->justificativa;

        $atual = Requerimento::find($id)->update(['justificativa'=>$just, 'anexo'=>$anexoName]);
        return redirect()->to(route('aluno.index'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $excluiDesp = Despacho::find($id)->delete();
        $excluiTram = Tramite::find($id)->delete();
        $excluiReq = Requerimento::find($id)->delete();
        return redirect()->to(route('aluno.index'));
    }
}

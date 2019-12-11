<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Requerimento;
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
        
        return view('Paginas.Aluno.index', ['id'=>$id, 'nome'=>$nome, 'matricula'=>$matricula,'foto'=>$foto, 'vinculo'=>$vinculo, 'requerimentos' => $requerimentos, 'despachos' => $despachos]);
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

        $tipoArquivo = $request->anexo->getMimeType();


        if($tipoArquivo == 'application/pdf'){

           
            $anexoName = uniqid(date('HisYmd')).".".$request->anexo->extension();
            //$anex = $request->anexo->storeAs('anexos', $anexoName);
            $request->file('anexo')->move(public_path('anexos'), $anexoName);
            return var_dump($request->file('anexo'));

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
        $req->status = "Aguardando avaliação";

        $req->save();

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
        $tipoArquivo = $request->anexo->getMimeType();

        if($tipoArquivo == 'application/pdf'){

            $anexoName = uniqid(date('HisYmd')).".".$request->anexo->extension();
            $anex = $request->anexo->storeAs('anexos', $anexoName);

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
        $exclui = Requerimento::find($id)->delete();
        return redirect()->to(route('aluno.index'));
    }
}

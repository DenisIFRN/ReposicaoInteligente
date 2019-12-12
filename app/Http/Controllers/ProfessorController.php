<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Requerimento;
use App\Tramite;
use App\Despacho;

class ProfessorController extends Controller
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
            /* if($sessao['2'] != 'Docente'){
                return redirect()->to(route('loginForm'));
            }*/
        }else{
            return redirect()->to(route('loginForm'));
        }

        include 'CredenciaisServidor.php';

        $requerimentos = Requerimento::get();

        $tramites = Tramite::get();

        $nTramites = count($tramites);
        
        return view('Paginas.Professor.index', ['id'=>$id, 'nome'=>$nome, 'matricula'=>$matricula,'foto'=>$foto, 'vinculo'=>$vinculo, 'requerimentos' => $requerimentos, 'tramites'=>$tramites, 'nTramites'=>$nTramites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $id_docente = $request->idDocente;
        $avaliacao = $request->avaliacao;
        $observacao = $request->observacao;
        $local = $request->local;
        $data_aplicacao = $request->dataAplicacao;
        $data_avaliacao = date("d/m/Y");

        $atualiza = Despacho::find($id)->update(['id_docente' => $id_docente, 'avaliacao' => $avaliacao, 'observacao' => $observacao, 'local' => $local, 'data_aplicacao' => $data_aplicacao, 'data_avaliacao' => $data_avaliacao, 'id_tramite' => $id]);
        
        return redirect()->to(route('professor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

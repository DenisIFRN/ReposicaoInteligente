<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Requerimento;
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
            if($sessao['2'] != 'docente'){
                return redirect()->to(route('loginForm'));
            }
        }else{
            return redirect()->to(route('loginForm'));
        }

        include 'CredenciaisServidor.php';

        $requerimentos = Requerimento::get();
        
        return view('Paginas.Professor.index', ['id'=>$id, 'nome'=>$nome, 'matricula'=>$matricula,'foto'=>$foto, 'vinculo'=>$vinculo, 'requerimentos' => $requerimentos]);
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
        $desp = new Despacho;
        $desp->id_docente = $request->idDocente;
        $desp->avaliacao = $request->avaliacao;
        $desp->observacao = $request->observacao;
        $desp->local = $request->local;
        $desp->data_aplicacao = $request->dataAplicacao;
        $desp->data_avaliacao = date("d/m/Y");
        $desp->id_tramite = $request->id;

        $desp->save();

        return redirect()->to(route('professor.index'));
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
        $stat = $request->status;

        $status = Requerimento::find($id)->update(['status' => $stat]);
        return redirect()->to(route('secretario.index'));
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

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Requerimento;
use App\Tramite;

class SecretarioController extends Controller
{
    /**
     * Display a listing of the resource.

        DB_CONNECTION=pgsql
        DB_HOST=ec2-174-129-255-76.compute-1.amazonaws.com
        DB_PORT=5432
        DB_DATABASE=d8celnkcvbuvd6
        DB_USERNAME=pfgiexlqkymknn
        DB_PASSWORD=c4c3935a2b51e1b31a374f6908a9a5b2c0e0056258395a505cc5a3fd1913640b
        
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('user')) {
            $sessao = Session::get('user');
            /* if($sessao['2'] != 'Secretario'){
                return redirect()->to(route('loginForm'));
            } */
        }else{
            return redirect()->to(route('loginForm'));
        }

        include 'CredenciaisServidor.php';

        $requerimentos = Requerimento::get();
        
        return view('Paginas.Secretario.index', ['id'=>$id, 'nome'=>$nome, 'matricula'=>$matricula,'foto'=>$foto, 'vinculo'=>$vinculo, 'requerimentos' => $requerimentos]);
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
        $tram = new Tramite;
        $tram->id_servidor = $request->idSecretario;
        $tram->avaliacao = $request->status;
        $tram->observacao = $request->observacao;
        $tram->data = date("d/m/Y");
        $tram->id_requerimento = $request->id;

        $tram->save();

        return redirect()->to(route('secretario.index'));
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
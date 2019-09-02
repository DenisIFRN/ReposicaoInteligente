@extends('Visual.visualPaginas')

@section('conteudo')

<main class="app-content">
       <div class="row">
        <div class="col-md-10 offset-md-1">
          <div class="tile">
            <h3 class="tile-title">Solicitações recebidas</h3>
            <div>

              <div id="accordion">
                <div class="card bg-light>
                  <div class="card-header" id="headingTwo" >
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <b>Curso/Turma:</b>                          
                        </div>

                        <div class="col-md-6">
                          <b>Disciplina:</b>                          
                        </div> 
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <b>Anexo: </b>                       
                        </div>

                        <div class="col-md-6">
                          <b>Data da solicitação:</b>                          
                        </div> 
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <b>Justificativa:</b>
                          <div class="col-md-6">
                            KAJKJAJSDJDJDJHFHGGGGGGGGGGGGHFHHn
                          </div>                      
                        </div> 

                        <div class="col-md-6">
                          <button type="button" class="btn btn-outline-success pull-right" data-toggle="modal" data-target="#exampleModal"> Marcar reposição</button>
                              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel"> Marque a reposição</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                  <div class="modal-body">
                                    Sala: <input type="string" name=""/>
                                    <br>
                                    Data: <input type="date" name=""/>
                                    <br>
                                    Horário: <input type="time" name="appt-time"
                                    min="7:00" max="22:00" required/>
                                    <br>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="button" class="btn btn-primary"> Enviar</button>
                                  </div>

                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

      </main>

@endsection
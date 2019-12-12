@extends('Visual.visualPaginas')

@section('conteudo')
	<main class="app-content">
		<div id="accordion">
			<div class="tile">
				<div class="table-responsive">
					<h3>Suas Solicitações</h3> <br>
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">Data da Solicitação</th>
						      	<th scope="col">Justificativa</th>
						      	<th scope="col">Detalhar</th>
						      	<th scope="col">Editar</th>
						      	<th scope="col">Excluir</th>
							</tr>
						</thead>
						@foreach($requerimentos as $requerimento)
							<tbody>
								<td>{{ $requerimento->data }}</td>
								<td>{{ $requerimento->justificativa }}</td>
								<td> <button type="button" class="btn btn-link collapsed" data-toggle="modal" data-target="#modalDetalh-{{ $requerimento->id }}">Detalhe</button> </td>

								<td> <button type="button" class="btn btn-link collapsed" data-toggle="modal" data-target="#modalEdit-{{ $requerimento->id }}" data-whatever="{{ $requerimento->id }}" data-whateverjustificativa="{{ $requerimento->justificativa }}"><i class="app-menu__icon fa fa-pencil-square-o"></i><span class="app-menu__label"></span></button> </td>

								<td> <button type="button" class="btn btn-link collapsed" data-toggle="modal" data-target="#modalExcl-{{ $requerimento->id }}"><i class="app-menu__icon fa fa-trash"></i><span class="app-menu__label"></span></button> </td>
							</tbody>
							<div class="modal fade" id="modalEdit-{{ $requerimento->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Editar solicitação</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<div class="modal-body">
											<form enctype="multipart/form-data" action="{{route('aluno.update', [$requerimento->id])}}" method="POST">
												{{ csrf_field() }}
												{{ method_field('PUT') }}

												<div class="form-group">
													<label for="recipient-name" class="col-form-label">Justificativa:</label>
													<select class="form-control" id="exampleFormControlSelect2" name="justificativa">
														<option value="Problemas_de_Saúde">Problemas de Saúde</option>
														<option value="Problemas_com_o_transporte">Problemas com o transporte</option>
														<option value="Apresentação_ao_serviço_militar">Apresentação ao serviço militar</option>
													</select>
												</div>
												<div class="form-group">
													<label for="message-text" class="col-form-label">Anexo:</label>
													<input type="file" name="anexo" value="{{$requerimento->anexo}}" class="form-control" id="recipient-name">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
													<button type="submit" class="btn btn-success">Enviar</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>

							<div class="modal fade" id="modalExcl-{{ $requerimento->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Deseja realmente excluir esta solicitação?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<div class="modal-footer">
											<form action="{{route('aluno.destroy', ['id' => $requerimento->id])}}" method="POST">
												@method('DELETE')
												@csrf
												<input type="submit" class="btn btn-primary" value="Sim"></input>
								                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
											</form>
										</div>
									</div>
								</div>
							</div>

							<div class="modal fade" id="modalDetalh-{{ $requerimento->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Dados da solicitação</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<div class="modal-body">
											@for ($i = 0; $i < $nDespachos; $i++)
												@for($i = 0; $i < $nDespachos; $i++)
													@if($requerimento->id == $despachos[$i]['id_tramite'])
														<label for="recipient-name" class="col-form-label"><b>Id docente:</b></label>
														{{ $despachos[$i]->id_docente }} <br>

														<label for="recipient-name" class="col-form-label"><b>Avaliação:</b></label>
														{{ $despachos[$i]->avaliacao }} <br>

														<label for="recipient-name" class="col-form-label"><b>Observação:</b></label>
														{{ $despachos[$i]->observacao }} <br>

														<label for="recipient-name" class="col-form-label"><b>Local da prova:</b></label>
														{{ $despachos[$i]->local }} <br>

														<label for="recipient-name" class="col-form-label"><b>Data da aplicação:</b></label>
														{{ $despachos[$i]->data_aplicacao }} <br>
												    @endif
												@endfor
											@endfor
										</div>
										<div class="modal-footer">
								            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
										</div>
									</div>
								</div>
							</div>	
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</main>
@endsection
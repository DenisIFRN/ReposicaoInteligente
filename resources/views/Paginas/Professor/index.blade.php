@extends('Visual.visualPaginas')

@section('conteudo')
	<main class="app-content">
		<div id="accordion">
			<div class="tile">
				<h3>Solicitações Recebidas (Professor)</h3> <br>
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">Data da Solicitação</th>
					      	<th scope="col">Justificativa</th>
					      	<th scope="col">Editar Situação</th>
					      	<th scope="col">Detalhar</th>
						</tr>
					</thead>
					@foreach($requerimentos as $requerimento)
						<tbody>
							<td>{{ $requerimento->data }}</td>
							<td>{{ $requerimento->justificativa }}</td>
							<td> <button type="button" class="btn btn-link collapsed" data-toggle="modal" data-target="#modalEditStatusProf-{{ $requerimento->id }}">{{ $requerimento->status }}</button></td>

							<td> <button type="button" class="btn btn-link collapsed" data-toggle="modal" data-target="#modalEditSecretario-{{ $requerimento->id }}">Avaliar</button> </td>
						</tbody>

						<div class="modal fade" id="modalEditStatusProf-{{ $requerimento->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Editar status da soliciitação</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<form action="{{route('professor.update', [$requerimento->id])}}" method="POST">
											{{ csrf_field() }}
											{{ method_field('PUT') }}

											<label for="recipient-name" class="col-form-label"><b>Status:</b></label>
											<select class="form-control" id="exampleFormControlSelect" name="status">
												<option value="Deferido">Deferido</option>
												<option value="Indeferido">Indeferido</option>
											</select>

											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn btn-success">Enviar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

						<div class="modal fade" id="modalEditSecretario-{{ $requerimento->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Avaliar solicitação</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">

										<form action="{{route('professor.store', ['id' => $requerimento->id, 'idDocente' => $id])}}" method="POST">
											{{ csrf_field() }}

											<img class="app-sidebar__user-avatar" src="https://suap.ifrn.edu.br{{ $requerimento->foto }}"> <br>

											<label for="recipient-name" class="col-form-label"><b>Id aluno:</b></label>
											{{ $requerimento->id }} <br>

											<label for="recipient-name" class="col-form-label"><b>Id docente:</b></label>
											{{ $requerimento->id_docente }} <br>

											<label for="recipient-name" class="col-form-label"><b>Id disciplina:</b></label>
											{{ $requerimento->id_disciplina }} <br>

											<label for="recipient-name" class="col-form-label"><b>Status:</b></label>
											{{ $requerimento->status }}<br>

											<label for="recipient-name" class="col-form-label"><b>Anexo:</b></label>
											<a href="{{ route ('download', [$requerimento->anexo]) }}">Download</a> <br><br>

											<label for="recipient-name" class="col-form-label"><b>Situação:</b></label>
											<select class="form-control" id="exampleFormControlSelect" name="avaliacao">
												<option value="Deferido">Deferido</option>
												<option value="Indeferido">Indeferido</option>
											</select>

											<label for="recipient-name" class="col-form-label"><b>Observação:</b></label>
											<textarea name='observacao' class="form-control" rows="3"></textarea>

											<label for="recipient-name" class="col-form-label"><b>Local da aplicação:</b></label>
											<textarea name='local' class="form-control" rows="2"></textarea>

											<label for="recipient-name" class="col-form-label"><b>Data aplicação</b></label>
									    	<input class="form-control" type="date" name="dataAplicacao">
											

											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn btn-success">Enviar</button>
											</div>
										</form>										
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</table>
			</div>
		</div>
	</main>
@endsection
@extends('Visual.visualPaginas')

@section('conteudo')
	<main class="app-content">
		<div id="accordion">
			<div class="tile">
				<h3>Suas Solicitações</h3> <br>
				<div class="card bg-light">
					<div class="card-header" id="headingTwo">
						<div class="row">
							<div class="col-md-4">
								Data da Solicitação
							</div>
							<div class="col-md-5">
								Motivo
							</div>
							<div class="col-md-3">
								Situação
							</div>
						</div>
					</div>
					<div class="card-header" id="headingTwo">
						<div class="row">
							<div class="col-md-4">
								<h5 class="mb-0">
									<p class="btn btn-link collapsed" aria-expanded="false">03/10/2019</p>
								</h5>
							</div>
							<div class="col-md-5">
								<h5 class="mb-0">
									<p class="btn btn-link collapsed" aria-expanded="false">Estava Doente</p>
								</h5>
							</div>
							<div class="col-md-2">
								<h5 class="mb-0">
									<p class="btn btn-link collapsed" aria-expanded="false">Deferida</p>
								</h5>
							</div>
							<div class="col-md-1">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="app-menu__icon fa fa-chevron-circle-down"></i>
									<span class="app-menu__label"></span>
									</button>
								</h5>
							</div>
						</div>
						
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<b>Curso/Turma:</b>
									Informática/1M
								</div>
								<div class="col-md-6">
									<b>Disciplina:</b>
									Projetos finais
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<b>Anexo: </b>
									Anexo aqui
								</div>
								<div class="col-md-6">
									<b>Data da solicitação:</b>
									Dia/Mês/Ano
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<b>Justificativa:</b>
									<div class="col-md-6">
										Justificativa Aqui
									</div>
								</div>
								<div class="col-md-6">
									<button type="button" class="btn btn-outline-success-edit pull-right" data-toggle="modal" data-target="#exampleModalEdit">Editar</button>

									<button type="button" class="btn btn-outline-success-excluir pull-right" data-toggle="modal" data-target="#exampleModal">Excluir</button>

									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Deseja realmente excluir esta solicitação?</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-primary" data-dismiss="modal">Sim</button> 
			                      					<button type="button" class="btn btn-secondary">Não</button>
												</div>
											</div>
										</div>
									</div>
									<div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Editar solicitação</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												</div>
												<div class="modal-body">
													<label for="exampleFormControlSelect1">Anexo</label>
													<div class="input-group mb-3">
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
															<label class="custom-file-label" for="inputGroupFile01">Procurar arquivo...</label>
														</div>
													</div>
													<div class="form-group">
														<label for="exampleFormControlTextarea1">Justificativa</label>
														<textarea name='justificativa' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-primary" data-dismiss="modal">Salvar</button> 
			                      					<button type="button" class="btn btn-secondary">Cancelar</button>
												</div>
											</div>
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
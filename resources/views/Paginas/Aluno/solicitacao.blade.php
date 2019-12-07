@extends('Visual.visualPaginas')

@section('conteudo')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<main class="app-content">
		<div class="accordion">
			<div class="tile">
				<h3>Solicitar Reposição</h3>
				<form method="post" enctype="multipart/form-data" action="{{ route('aluno.store', ['id' => $id, 'foto' => $foto, 'arrayTurmas' => $arrayTurmas]) }} ">
					{{csrf_field()}}
					<div class="form-group">
						<label for="exampleFormControlSelect1">Disciplina</label> <br>
						<select class="form-control" id="exampleFormControlSelect1" name="disciplina">
							@foreach($arrayTurmas as $turmas)
								<option value="{{ $turmas['1'] }}">{{ $turmas["0"] }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect2">Justificativa</label>
						<select class="form-control" id="exampleFormControlSelect2" name="justificativa">
							<option value="Problemas_de_Saúde">Problemas de Saúde</option>
							<option value="Problemas_com_o_transporte">Problemas com o transporte</option>
							<option value="Apresentação_ao_serviço_militar">Apresentação ao serviço militar</option>
						</select>
					</div>
					<label for="exampleFormControlTextarea1">Anexar documento comprovante</label>
					<div class="input-group mb-3">
						<div class="custom-file">
							<label for="message-text" class="col-form-label"></label>
							<input type="file" name="anexo" class="form-control" id="file" aria-describedby="inputGroupFileAddon01">
						</div>
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" name="toggle" class="custom-control-input" id="customCheck1">
						<label class="custom-control-label" for="customCheck1">Declaro estar ciente da necessidade de apresentar documento(s) que comprove(m) a minha ausência da atividade selecionada.</label> <br>
					</div>
					<br>
					<button type="submit" class="btn btn-success" id="aplica" onclick="checar()" disabled>Enviar</button> 
				</form>
			</div>
		</div>
	</main>
@endsection
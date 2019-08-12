@extends('Visual.visualPaginas')

@section('conteudo')

<main class="app-content">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="tile">
              <form method="post" action="{{ route('salvar') }}">
                {{csrf_field()}}
                <div>
                  <h3 >Solicitar Reposição</h3>
                </div>
                <input type="hidden" name="id_aluno" value="{{ $id }}">
                <input type="hidden" name="id_docente" value="">
                <br>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Disciplina</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="disciplina">
                      @foreach($turmasVirtuais as $turmas)
                        <option value="{{ $turmas['id'] }}">{{ $turmas["descricao"] }}</option>
                      @endforeach
                    </select>
                  </label>
                </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Motivo</label>
                    <textarea name='justificativa' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <label for="exampleFormControlTextarea1">Anexar documento comprovante</label>
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input type="file" name="anexo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Procurar arquivo...</label>
                    </div>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Declaro estar ciente da necessidade de apresentar documento(s) que comprove(m) a minha ausência da atividade selecionada.</label>
                  </div><br>
                  <button type="submit" class="btn btn-success">Enviar</button>
                </form>
              </div>
            </div>
          </div>
      </main>

@endsection
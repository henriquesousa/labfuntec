@extends('layouts.dashboard')
  @section('head')
      @parent
      <title>cPanel :: Adicionar Saida  LABORATÓRIO FUNTEC</title>
  @stop
 @section('conteudo')

    <!-- Exibir erros -->
    @if (isset($errors))
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
      @endforeach
    @endif

    <div class="table">
      {{ Form::open([
        "url" => "saida",
        "autocomplete" => "on",
        "class" => "form-horizontal"
      ]) }}

        <!-- Form Name -->
        <h3>Adicionar Saida </h3>

        <div class="panel panel-primary"><!-- painel-->
          <div class="panel-heading">
            <h3 class="panel-title text-center">Dados Cadastrais</h3>
          </div>
          <div class="panel-body">

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Descricao">Descrição</label>
              <div class="col-md-5">
                {{ Form::text('descricao', isset($saida->descricao) ? $saida->descricao : Input::old('descricao'), array('class' => 'form-control input-md')) }}
              </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Valor">Valor</label>
              <div class="col-md-5">
                {{ Form::text('valor', isset($saida->valor) ? $saida->valor : Input::old('valor'), array('class' => 'form-control input-md valor')) }}
              </div>
            </div>

          </div>
        </div><!-- /painel -->


        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="cadastrar"></label>
          <div class="col-md-8">
            <input type="submit" value="Adicionar" class="btn btn-primary btn-sm" />
            <a class="btn btn-sm btn-danger" href="{{ URL::to('saida') }}">Cancelar</a>
          </div>
        </div>




       {{ Form::close() }}
    </div><!-- /table -->

@stop
@section('scripts')

  <script type="text/javascript">
      /*
      Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
      */
      $(document).ready(function(){
        //mascara para exibição jquery
          $('.valor').mask('00.00');
          $('.cpf').mask('000.000.000-00');
      });
  </script>
@stop
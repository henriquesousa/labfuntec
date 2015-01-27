@extends('layouts.dashboard')
@section('head')
  @parent
    <title>cPanel :: Editar Saida LABORATÓRIO FUNTEC</title>

  @stop
@section('conteudo')

    @if (isset($errors))
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
      @endforeach
    @endif

  	<div class="table">

  	
    {{ Form::model($saida, array('route' => array('saida.update', $saida->id), 'method' => 'PUT')) }}
    
              
                <!-- Form Name -->
                <h3>Editando Saida - "{{ $saida->descricao }}" </h3>
                
                <div class="panel panel-primary"><!-- painel-->
                  <div class="panel-heading">
                    <h3 class="panel-title text-center">Dados da Saida</h3>
                  </div>
                  <div class="panel-body">

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="Descricao">Descrição:</label>  
                      <div class="col-md-5">
                        {{ Form::text('descricao', isset($saida->descricao) ? $saida->descricao : Input::old('descricao'), array('class' => 'form-control input-md')) }}                        
                      </div>
                    </div>

                     <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="CPF">Valor:</label>  
                      <div class="col-md-5">
                        {{ Form::text('valor', isset($saida->valor) ? $saida->valor : Input::old('valor'), array('class' => 'form-control input-md valor')) }}
                      </div>
                    </div>

                    

                </div>
              </div><!-- / painel-->

              
                <!-- Button (Double) -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="cadastrar"></label>
                  <div class="col-md-8">
                    <input type="submit" value="Editar" class="btn btn-sm btn-primary" />
                    <a class="btn btn-sm btn-danger" href="{{ URL::to('saida') }}">Voltar</a>
                  </div>
                </div>


               

              
        {{ Form::close() }}
  </div>
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



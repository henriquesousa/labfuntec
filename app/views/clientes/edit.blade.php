@extends('layouts.dashboard')
@section('head')
  @parent
    <title>cPanel :: Editar Cliente LABORATÓRIO FUNTEC</title>

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

  	
    {{ Form::model($cliente, array('route' => array('cliente.update', $cliente->id), 'method' => 'PUT')) }}
    
              
                <!-- Form Name -->
                <h3>Editando Cliente - "{{ $cliente->nome }}" </h3>
                
                <div class="panel panel-primary"><!-- painel-->
                  <div class="panel-heading">
                    <h3 class="panel-title text-center">Dados do Cliente</h3>
                  </div>
                  <div class="panel-body">

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="Nome">Nome e Sobrenome:</label>  
                      <div class="col-md-5">
                        {{ Form::text('nome', isset($cliente->nome) ? $cliente->nome : Input::old('nome'), array('class' => 'form-control input-md')) }}                        
                      </div>
                    </div>

                     <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="CPF">Número CPF:</label>  
                      <div class="col-md-5">
                        {{ Form::text('cpf', isset($cliente->cpf) ? $cliente->cpf : Input::old('cpf'), array('class' => 'form-control input-md cpf')) }}
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="RG">Telefone:</label>  
                      <div class="col-md-5">
                        {{ Form::text('telefone', isset($cliente->telefone) ? $cliente->telefone : Input::old('telefone'), array('class' => 'form-control input-md telefone')) }}
                      </div>
                    </div>

                </div>
              </div><!-- / painel-->

              
                <!-- Button (Double) -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="cadastrar"></label>
                  <div class="col-md-8">
                    <input type="submit" value="Editar" class="btn btn-sm btn-primary" />
                    <a class="btn btn-sm btn-danger" href="{{ URL::to('cliente') }}">Voltar</a>
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
          $('.telefone').mask('(00) 0000-0000');
          $('.cpf').mask('000.000.000-00');
      });
  </script>
@stop



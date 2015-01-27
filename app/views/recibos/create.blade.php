@extends('layouts.dashboard')
  @section('head')
      @parent
      <title>cPanel :: Adicionar Convênio  LABORATÓRIO FUNTEC</title>
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
        "url" => "recibo",
        "autocomplete" => "on",
        "class" => "form-horizontal"
      ]) }}

        <!-- Form Name -->
        <h3>Adicionar Convênio </h3>

        <div class="panel panel-primary"><!-- painel-->
          <div class="panel-heading">
            <h3 class="panel-title text-center">Dados Cadastrais</h3>
          </div>
          <div class="panel-body">

            <div class="form-group">
              <label class="col-md-4 control-label" for="cliente">Cliente:</label>
              <div class="input-group col-md-5">

                <select name="cliente" class="form-control">
                <option >Selecione...</option>
                @foreach ($clientes as $cliente)
                  <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
                </select>

                <div class="input-group-btn">
                      <a class="btn btn-sm btn-success pull-right" href="{{ URL::to('cliente/create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                      </div>
              </div>
            </div>

             <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Corrego">Córrego</label>
              <div class="col-md-5">
                {{ Form::text('corrego', isset($convenio->corrego) ? $convenio->corrego : Input::old('corrego'), array('class' => 'form-control input-md')) }}
              </div>
            </div>

             <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Cidade">Cidade</label>
              <div class="col-md-5">
                {{ Form::text('cidade', isset($convenio->cidade) ? $convenio->cidade : Input::old('cidade'), array('class' => 'form-control input-md')) }}
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="convenio">Convênio:</label>
              <div class="input-group col-md-5">

                <select name="convenio" class="form-control">
                <option >Selecione...</option>
                @foreach ($convenios as $convenio)
                  <option value="{{ $convenio->id }}">{{ $convenio->nome }}</option>
                @endforeach
                </select>

                <div class="input-group-btn">
                      <a class="btn btn-sm btn-success pull-right" href="{{ URL::to('convenio/create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                      </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="cliente">Analises:</label>
              <div class="input-group col-md-5">
              @foreach ($analises as $analise)
                {{ Form::checkbox('analise[]', $analise->id, false) }} {{ $analise->descricao }}
              @endforeach

                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Pagamento">Pagamento:</label>
              <div class="input-group col-md-5">
                {{ Form::radio('pagamento', '1') }} sim
                {{ Form::radio('pagamento', '2') }}não
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-4 control-label" for="status">Sattus:</label>
              <div class="input-group col-md-5">

                <select name="status" class="form-control">
                  <option >Selecione...</option>
                  <option value="1">Andamento</option>
                  <option value="2">Concluido</option>
                </select>

              </div>
            </div>

          </div>
        </div><!-- /painel -->


        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="cadastrar"></label>
          <div class="col-md-8">
            <input type="submit" value="Adicionar" class="btn btn-primary btn-sm" />
            <a class="btn btn-sm btn-danger" href="{{ URL::to('recibo') }}">Cancelar</a>
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
          $('.valo').mask('00.00');
          $('.data').mask('000.000.000-00');
      });
  </script>
@stop
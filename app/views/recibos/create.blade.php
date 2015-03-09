@extends('layouts.dashboard')
  @section('head')
      @parent
      <title>cPanel :: Adicionar Convênio  LABORATÓRIO FUNTEC</title>
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
      <script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
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
        <h3>Adicionar Recibo </h3>

        <div class="panel panel-primary"><!-- painel-->
          <div class="panel-heading">
            <h3 class="panel-title text-center">Dados Cadastrais</h3>
          </div>
          <div class="panel-body" align="center">

            <div class="form-group col-md-12">
              <label class="col-md-3 control-label" for="cliente">Cliente:</label>
              <div class="input-group col-md-5">

                <select name="cliente" class="form-control">
                <option value="">Selecione...</option>
                @foreach ($clientes as $cliente)
                  <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
                </select>

                <div class="input-group-btn">
                      <a class="btn btn-sm btn-success pull-right" href="{{ URL::to('cliente/create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                      </div>
              </div>
            </div>

            <div class="form-group col-md-12">
                <label class="col-md-3 control-label" for="LabRef">LabRef:</label>
                <div class="col-md-5">
                    {{ Form::text('labref', Input::old('labref'), array('class' => 'form-control input-md', 'placeholder' => 'código da análise')) }}
                </div>
            </div>

            <div class="form-group col-md-12">
              <label class="col-md-3 control-label" for="convenio">Convênio:</label>
              <div class="input-group col-md-5">

                <select name="convenio" class="form-control">
                <option value="">Selecione...</option>
                @foreach ($convenios as $convenio)
                  <option value="{{ $convenio->id }}">{{ $convenio->nome }}</option>
                @endforeach
                </select>

                <div class="input-group-btn">
                      <a class="btn btn-sm btn-success pull-right" href="{{ URL::to('convenio/create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                      </div>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group col-md-12">
              <label class="col-md-3 control-label" for="Pagamento">Pagamento:</label>
              <div class="input-group col-md-5">
                {{ Form::radio('pagamento', '1') }} sim
                {{ Form::radio('pagamento', '2') }}não
              </div>
            </div>

            <div class="form-group col-md-12">
              <label class="col-md-3 control-label" for="status">Sattus:</label>
              <div class="input-group col-md-5">

                <select name="status" class="form-control">
                  <option >Selecione...</option>
                  <option value="1">Andamento</option>
                  <option value="2">Concluido</option>
                </select>

              </div>
            </div>


              <div id="tabs" class="col-md-12" align="center">
                  <ul class="info">
                      <li><a href="#tabs-1">Gleba 1</a></li>
                      <li><a href="#tabs-2">Gleba 2</a></li>
                      <li><a href="#tabs-3">Gleba 3</a></li>
                  </ul>
                  <div id="tabs-1">
                      <!-- Text input-->
                      <div class="form-group">
                          <label class="col-md-3 control-label" for="Corrego">Córrego</label>
                          <div class="col-md-6">
                              {{ Form::text('corrego1', isset($convenio->corrego) ? $convenio->corrego : Input::old('corrego1'), array('class' => 'form-control input-md')) }}
                          </div>
                      </div>

                      <!-- Text input-->
                      <div class="form-group">
                          <label class="col-md-3 control-label" for="Cidade">Cidade</label>
                          <div class="col-md-6">
                              {{ Form::text('cidade1', isset($convenio->cidade) ? $convenio->cidade : Input::old('cidade1'), array('class' => 'form-control input-md')) }}
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="cliente">Analises:</label>
                          <div class="input-group col-md-6">
                              @foreach ($analises as $analise)
                                  {{ Form::checkbox('analise[1][]', $analise->id, false) }} {{ $analise->descricao }}
                              @endforeach


                          </div>
                      </div>
                  </div>
                  <div id="tabs-2">
                      <!-- Text input-->
                      <div class="form-group">
                          <label class="col-md-3 control-label" for="Corrego">Córrego</label>
                          <div class="col-md-6">
                              {{ Form::text('corrego2', isset($convenio->corrego) ? $convenio->corrego : Input::old('corrego2'), array('class' => 'form-control input-md')) }}
                          </div>
                      </div>

                      <!-- Text input-->
                      <div class="form-group">
                          <label class="col-md-3 control-label" for="Cidade">Cidade</label>
                          <div class="col-md-6">
                              {{ Form::text('cidade2', isset($convenio->cidade) ? $convenio->cidade : Input::old('cidade2'), array('class' => 'form-control input-md')) }}
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="cliente">Analises:</label>
                          <div class="input-group col-md-6">
                              @foreach ($analises as $analise)
                                  {{ Form::checkbox('analise[2][]', $analise->id, false) }} {{ $analise->descricao }}
                              @endforeach


                          </div>
                      </div>
                  </div>
                  <div id="tabs-3">
                      <!-- Text input-->
                      <div class="form-group">
                          <label class="col-md-3 control-label" for="Corrego">Córrego</label>
                          <div class="col-md-6">
                              {{ Form::text('corrego3', isset($convenio->corrego) ? $convenio->corrego : Input::old('corrego3'), array('class' => 'form-control input-md')) }}
                          </div>
                      </div>

                      <!-- Text input-->
                      <div class="form-group">
                          <label class="col-md-3 control-label" for="Cidade">Cidade</label>
                          <div class="col-md-6">
                              {{ Form::text('cidade3', isset($convenio->cidade) ? $convenio->cidade : Input::old('cidade3'), array('class' => 'form-control input-md')) }}
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="cliente">Analises:</label>
                          <div class="input-group col-md-6">
                              @foreach ($analises as $analise)
                                  {{ Form::checkbox('analise[3][]', $analise->id, false) }} {{ $analise->descricao }}
                              @endforeach


                          </div>
                      </div>
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
      $(function() {
          $( "#tabs" ).tabs({
              event: "mouseover"
          });
      });
      $(document).ready(function(){
        //mascara para exibição jquery
          $('.valo').mask('00.00');
          $('.data').mask('000.000.000-00');
      });
  </script>
@stop
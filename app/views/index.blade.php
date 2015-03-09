 @extends('layouts.dashboard')

 @section('head')
      @parent
      <title>cPanel - Funcionarios Listar</title>
      <style type="text/css">
        .conteudo {
        padding-top: 40px;
        }
        .panel-default{
        text-align:center;
        cursor:pointer;
        font-family: 'Raleway',sans-serif;
        }
        .panel-default > .panel-footer {
            color: #fff;
            background-color: #47c8ed;    
            display:none;
            text-shadow: 1px 1px 1px rgba(150, 150, 150, 1);
        }
        .panel-default i{
            font-size: 5em;
        }
    </style>
  @stop
 @section('conteudo')

    <div class="container conteudo">
      <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h2>Funcionarios</h2>
                    <p>Registros: {{ $qtd['fun'] }}</p>
                    <p class="alert-info">Passe o mouse</p>
                </div>
                @foreach($funcionarios as $fc)
                    <div class="panel-footer"><a href="#"><span class="badge">{{ $fc->nome }}</span></a></div>
                @endforeach
            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h2>Clientes</h2>
                    <p>Registros: {{ $qtd['cli'] }}</p>
                    <p class="alert-info">Passe o mouse</p>
                </div>
                @foreach($clientes as $cli)
                      <div class="panel-footer"><a href="#"><span class="badge">{{ $cli->nome }}</span></a></div>
                @endforeach
            </div>
        </div>
      </div>
      <div class="row">
          <div class="col-md-3 col-sm-4 col-xs-12">
              <div class="panel panel-default">
                  <div class="panel-body text-center">
                      <h2>Convênios</h2>
                      <p>Registros: {{ $qtd['conv'] }}</p>
                      <p class="alert-info">Passe o mouse</p>
                  </div>
                  @foreach($convenios as $conv)
                      <div class="panel-footer"><a href="#"><span class="badge">{{ $conv->nome }}</span></a></div>
                  @endforeach
              </div>
          </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h2>Analises</h2>
                    <p>Registros: {{ $qtd['anal'] }}</p>
                    <p class="alert-info">Passe o mouse</p>
                </div>
                @foreach($analises as $anal)
                    <div class="panel-footer"><a href="#"><span class="badge">{{ $anal->descricao }}</span></a></div>
                @endforeach
            </div>
          </div>
            
      </div>
    </div>

@stop

@section('scripts')


<script type="text/javascript">
    $(function(){
        $('.panel').hover(function(){
                $(this).find('.panel-footer').slideDown(250);
            },function(){
                $(this).find('.panel-footer').slideUp(250); //.fadeOut(205)
            });
    });

    var activeEl = 1;
$(function() {
    var items = $('.btn-nav');
    $( items[activeEl] ).addClass('active');
    $( ".btn-nav" ).click(function() {
        $( items[activeEl] ).removeClass('active');
        $( this ).addClass('active');
        activeEl = $( ".btn-nav" ).index( this );
    });
});

   
</script>
@stop

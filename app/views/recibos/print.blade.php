 @extends('layouts.print')

 @section('head')
      @parent
      <title>cPanel :: Recibos LABORATÓRIO FUNTEC</title>
      <style type="text/css">

          .compact, tbody, tr, td {
              font-size: 12px;
              height: 5px;
              padding: 0px;
              border: 0px;
          }
          tr, td {
              height: 5px;
              padding: 0px;
              border: 0px;

          }
          tbody tr {
              height: 7px;
          }
          .itens {
              border-bottom: dotted 1px #000000;
          }
			
		</style>
  @stop
 @section('conteudo')

<form>
    <table class="compact">
        <tbody>
        <tr>
            <td><h3><small><b>Data: </b> {{ date('d/m/y', strtotime($recibo->created_at)) }}</small></h3></td>
            <td style="width: 350px;"><h2 class="text-center"><u>Recibo</u></h2></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td><b>Recebemos de:</b></td>
            <td>{{ $recibo->cliente->nome }}</td>
            <td><b>CPF:</b></td>
            <td>{{ $recibo->cliente->cpf }}</td>

        </tr>
        <tr>
            <td><b>Endereço:</b></td>
            <td colspan="3">{{ $recibo->corrego }} - {{ $recibo->cidade }} MG</td>
        </tr>
        <tr>
            <td><b>Convênio:</b></td>
            <td>{{ $recibo->convenio->nome }}</td>
            <td><b>Entrega:</b></td>
            <td>{{ date('d/m/y', strtotime($recibo->saida)) }}</td>
        </tr>
        <tr style="border-top: 2px #000000 solid">
            <td colspan="4"><b>Referente a:</b></td>
        </tr>

        <tr>
            <td colspan="4">

                <table class="analise" style="width:80%; margin-left:20px;">

                    <tr>
                        <th>Gleba</th>
                        <th>Analise</th>
                        <th>Valor $</th>
                    </tr>
                    @foreach($recibo->analise as $analise)
                        <tr class="itens">
                            <td>{{ $analise->pivot->gleba }}</td>
                            <td> {{ $analise->descricao }}</td>
                            <td class="valor">{{ $analise->valor}}</td>
                        </tr>
                    @endforeach

                </table>

            </td>
        </tr>

        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr style="border-top: 2px #000000 solid">
            <td><b>Emitente:</b></td>
            <td colspan="3">LABORATÓRIO DE ANALISE DE SOLOS - FUNTEC</td>

        </tr>
        <tr>
            <td><b>Endereço:</b></td>
            <td>BR-116 KM526 - Bairro das Graças - Caratinga MG</td>
            <td><b>Telefone:</b></td>
            <td>(33) 3321 - 1959</td>

        </tr>
        <tr>
            <td><b>Funcionario:</b></td>
            <td colspan="3">{{ $recibo->funcionario->nome }}</td>
        </tr>
        </tbody>
    </table>
<br/>
<hr/>

    <table class="compact">
        <tbody>
        <tr>
            <td><h3><small><b>Data: </b> {{ date('d/m/y', strtotime($recibo->created_at)) }}</small></h3></td>
            <td style="width: 350px;"><h2 class="text-center"><u>Recibo</u></h2></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td><b>Recebemos de:</b></td>
            <td>{{ $recibo->cliente->nome }}</td>
            <td><b>CPF:</b></td>
            <td>{{ $recibo->cliente->cpf }}</td>

        </tr>
        <tr>
            <td><b>Endereço:</b></td>
            <td colspan="3">{{ $recibo->corrego }} - {{ $recibo->cidade }} MG</td>
        </tr>
        <tr>
            <td><b>Convênio:</b></td>
            <td>{{ $recibo->convenio->nome }}</td>
            <td><b>Entrega:</b></td>
            <td>{{ date('d/m/y', strtotime($recibo->saida)) }}</td>
        </tr>
        <tr style="border-top: 2px #000000 solid">
            <td colspan="4"><b>Referente a:</b></td>
        </tr>

        <tr>
            <td colspan="4">

                <table class="analise" style="width:80%; margin-left:20px;">

                        <tr>
                            <th>Gleba</th>
                            <th>Analise</th>
                            <th>Valor $</th>
                        </tr>
                    @foreach($recibo->analise as $analise)
                        <tr class="itens">
                            <td>{{ $analise->pivot->gleba }}</td>
                            <td> {{ $analise->descricao }}</td>
                            <td class="valor">{{ $analise->valor}}</td>
                        </tr>
                    @endforeach

                 </table>

            </td>
        </tr>

        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr style="border-top: 2px #000000 solid">
            <td><b>Emitente:</b></td>
            <td colspan="3">LABORATÓRIO DE ANALISE DE SOLOS - FUNTEC</td>

        </tr>
        <tr>
            <td><b>Endereço:</b></td>
            <td>BR-116 KM526 - Bairro das Graças - Caratinga MG</td>
            <td><b>Telefone:</b></td>
            <td>(33) 3321 - 1959</td>

        </tr>
        <tr>
            <td><b>Funcionario:</b></td>
            <td colspan="3">{{ $recibo->funcionario->nome }}</td>
        </tr>
        </tbody>
    </table>
    <div class="pull-right">
        <input class="btn btn-sm btn-info" type="button" name="imprimir" value="Imprimir" onclick="window.print();">
    </div>


</form>  


@stop

@section('scripts')

<script type="text/javascript">
			
			$(document).ready(function(){

				//mascara para exibição jquery
				  $('.telefone').mask('(00) 0000-0000');
				  $('.valor').mask('00,00');
				
			});

		</script>
@stop
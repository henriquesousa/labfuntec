 @extends('layouts.print')

 @section('head')
      @parent
      <title>cPanel :: Recibos LABORATÓRIO FUNTEC</title>
      <style type="text/css">
			.filterable {
			    margin-top: 15px;
			}
			.filterable .panel-heading .pull-right {
			    margin-top: -20px;
			}
			.filterable .filters input[disabled] {
			    background-color: transparent;
			    border: none;
			    cursor: auto;
			    box-shadow: none;
			    padding: 0;
			    height: auto;
			}
			.filterable .filters input[disabled]::-webkit-input-placeholder {
			    color: #333;
			}
			.filterable .filters input[disabled]::-moz-placeholder {
			    color: #333;
			}
			.filterable .filters input[disabled]:-ms-input-placeholder {
			    color: #333;
			}
          .compact, tbody, tr, td {
              height: 5px;
              padding-top: 0px;
              padding-bottom: 0px;
              border-bottom: 0px;
              border-top: 0px;
          }
          tr, td {
              height: 5px;
              padding-top: 0px;
              padding-bottom: 0px;
              border-bottom: 0px;
              border-top: 0px;
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
            <td><h6><b>Recebemos de:</b></h6></td>
            <td><h6>{{ $recibo->cliente->nome }}</h6></td>
            <td><h6><b>CPF:</b></h6></td>
            <td><h6>{{ $recibo->cliente->cpf }}</h6></td>

        </tr>
        <tr>
            <td><h6><b>Endereço:</b></h6></td>
            <td colspan="3"><h6>{{ $recibo->corrego }} - {{ $recibo->cidade }} MG</h6></td>
        </tr>
        <tr>
            <td><h6><b>Convênio:</b></h6></td>
            <td><h6>{{ $recibo->convenio->nome }}</h6></td>
            <td><h6><b>Entrega:</b></h6></td>
            <td><h6>{{ date('d/m/y', strtotime($recibo->saida)) }}</h6></td>
        </tr>
        <tr>
            <td colspan="3"><h6><b>Referente a:</b></h6></td>
            <td><h6><b>R$</b></h6></td>
        </tr>

        @foreach($recibo->analise as $analise)
            <tr class="itens">
                <td colspan="3"><h6> {{ $analise->descricao }}</h6></td>
                <td class="valor"><h6> {{ $analise->valor}}</h6></td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td><h6><b>Emitente:</b></h6></td>
            <td colspan="3"><h6>LABORATÒRIO DE ANALISE DE SOLOS - FUNTEC</h6></td>

        </tr>
        <tr>
            <td><h6><b>Endereço:</b></h6></td>
            <td><h6>BR-116 KM526 - Bairro das Graças - Caratinga MG</h6></td>
            <td><h6><b>Telefone:</b></h6></td>
            <td><h6>(33) 3321 - 1959</h6></td>

        </tr>
        <tr>
            <td><h6><b>Funcionario:</b></h6></td>
            <td colspan="3"><h6>{{ $recibo->funcionario->nome }}</h6></td>
        </tr>
        </tbody>
    </table>

<hr/>
<br/>
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
			<td><h6><b>Recebemos de:</b></h6></td>
			<td><h6>{{ $recibo->cliente->nome }}</h6></td>
			<td><h6><b>CPF:</b></h6></td>
			<td><h6>{{ $recibo->cliente->cpf }}</h6></td>
							
		</tr>
		<tr>
			<td><h6><b>Endereço:</b></h6></td>
			<td colspan="3"><h6>{{ $recibo->corrego }} - {{ $recibo->cidade }} MG</h6></td>
		</tr>
        <tr>
            <td><h6><b>Convênio:</b></h6></td>
            <td><h6>{{ $recibo->convenio->nome }}</h6></td>
            <td><h6><b>Entrega:</b></h6></td>
            <td><h6>{{ date('d/m/y', strtotime($recibo->saida)) }}</h6></td>
        </tr>
        <tr>
            <td colspan="3"><h6><b>Referente a:</b></h6></td>
            <td><h6><b>R$</b></h6></td>
        </tr>

            @foreach($recibo->analise as $analise)
                <tr class="itens">
                    <td colspan="3"><h6> {{ $analise->descricao }}</h6></td>
                    <td class="valor"><h6> {{ $analise->valor}}</h6></td>
                </tr>
            @endforeach
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
		<tr>
			<td><h6><b>Emitente:</b></h6></td>
			<td colspan="3"><h6>LABORATÒRIO DE ANALISE DE SOLOS - FUNTEC</h6></td>

		</tr>
		<tr>
            <td><h6><b>Endereço:</b></h6></td>
            <td><h6>BR-116 KM526 - Bairro das Graças - Caratinga MG</h6></td>
			<td><h6><b>Telefone:</b></h6></td>
			<td><h6>(33) 3321 - 1959</h6></td>

		</tr>
		<tr>
			<td><h6><b>Funcionario:</b></h6></td>
			<td colspan="3"><h6>{{ $recibo->funcionario->nome }}</h6></td>
		</tr>
	</tbody>
</table>
    <div class="pull-right">
        <input class="btn btn-sm btn-info" type="button" name="imprimir" value="Imprimir" onclick="window.print();">
        <a class="btn btn-sm btn-danger" href="{{ URL::to('recibo') }}">Voltar</a>
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
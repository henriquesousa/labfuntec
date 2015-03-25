<a href="#"><strong><i class="glyphicon glyphicon-cog"></i> Menu - Opções</strong></a>  
          
<hr>
<ul class="nav nav-pills nav-stacked">
  <li class="nav-header"></li>
  <li><a href="{{ URL::to('cliente') }}"><i class="glyphicon glyphicon-list"></i> Clientes</a></li>
  <li><a href="{{ URL::to('convenio') }}"><i class="glyphicon glyphicon-paperclip"></i> Convênios</a></li>
  <li><a href="{{ URL::route('funcionarios') }}"><i class="glyphicon glyphicon-user"></i> Funcionários</a></li>
  <li><a href="{{ URL::to('analise') }}"> <i class="glyphicon glyphicon-barcode"></i> Analises</a> </li>
  <li><a href="{{ URL::to('saida') }}"><i class="glyphicon glyphicon-shopping-cart"></i> Saidas</a></li>
  <li><a href="{{ URL::to('recibo') }}"><i class="glyphicon glyphicon-shopping-cart"></i> Recibos</a></li>
  <li><a href="{{ URL::to('relatorio') }}"><i class="glyphicon glyphicon-list-alt"></i> Relatorios</a></li>
</ul>
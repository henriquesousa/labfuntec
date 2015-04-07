@extends('layouts.dashboard')

@section('head')
    @parent
    <title>cPanel :: Relatórios LABORATÓRIO FUNTEC</title>
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

            text-shadow: 1px 1px 1px rgba(150, 150, 150, 1);
        }
        .panel-default i{
            font-size: 5em;
        }
        .info{
            cursor: pointer;
        }
        .inform{
            display: none;
        }
        .inform2 {
            color:blue;
        }

    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".info").click(function(){
                var id = $(this).parent().parent().attr('id');
                $('#'+id + '~ div.inform').toggle();
            });
        });
    </script>
@stop
@section('conteudo')

        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <h1 class="text-center">Clientes</h1>
                    <div class="caption" id="1">
                        <h4>Pesquise <p class="glyphicon glyphicon-info-sign pull-right info"></p></h4>
                        {{ Form::open([
                           "url" => "relatorio/consulta-cliente",
                           "autocomplete" => "on",
                           "class" => "form-horizontal"
                        ]) }}

                            {{ Form::select('pagamento', [
                                '1' => 'Pago',
                                '2' => 'Devedor'
                            ], 0, ['class' => 'form-control']) }}
                            <p></p>

                            {{ Form::select('mes', [
                                '0' => 'Selecione Mes',
                                '1' => 'Janeiro',
                                '2' => 'Fevereiro',
                                '3' => 'Março',
                                '4' => 'Abril',
                                '5' => 'Maio',
                                '6' => 'Junho',
                                '7' => 'Julho',
                                '8' => 'Agosto',
                                '9' => 'Setembro',
                                '10' => 'Outubro',
                                '11' => 'Novembro',
                                '12' => 'Dezembro'
                            ], 0, ['class' => 'form-control']) }}
                            <p></p>
                            {{ Form::text('nome', isset($cliente->nome) ? $cliente->nome : Input::old('nome'), array('class' => 'form-control input-md', 'placeholder' => 'Nome Cliente')) }}
                            <p></p>
                        <p class="align-center">{{ Form::submit('Buscar', array('class' => 'btn btn-primary btn-block')) }}</p>

                        {{ Form::close() }}
                    </div>
                    <div class="alert alert-info inform" role="alert">
                        <p><small>Mês: lista todas as analises do mês informado</small></p>
                        <p><small>Nome: lista todas as analises do cliente informado</small></p>
                        <p><small>Mês+Nome: lista todas as analises do cliente no mês informado</small></p>
                        <p><small>Nada Selecionado: lista todas as analises cadastradas</small></p>
                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <h1 class="text-center">Convenios</h1>
                    <div class="caption" id="2">
                        <h4>Pesquise <p class="glyphicon glyphicon-info-sign pull-right info"></p></h4>
                        {{ Form::open([
                           "url" => "relatorio/consulta-convenio",
                           "autocomplete" => "on",
                           "class" => "form-horizontal",
                           "method" => "post"
                        ]) }}

                            {{ Form::select('pagamento', [
                                '1' => 'Pago',
                                '2' => 'Devedor'
                            ], 0, ['class' => 'form-control']) }}
                            <p></p>

                            {{ Form::select('mes', [
                                '0' => 'Selecione Mes',
                                '1' => 'Janeiro',
                                '2' => 'Fevereiro',
                                '3' => 'Março',
                                '4' => 'Abril',
                                '5' => 'Maio',
                                '6' => 'Junho',
                                '7' => 'Julho',
                                '8' => 'Agosto',
                                '9' => 'Setembro',
                                '10' => 'Outubro',
                                '11' => 'Novembro',
                                '12' => 'Dezembro'
                            ], 0, ['class' => 'form-control']) }}
                        <p></p>
                            {{ Form::select('convenio', $convenio_options , Input::old('convenio'), ['class' => 'form-control']) }}
                            <p></p>
                            <p class="align-center">{{ Form::submit('Buscar', array('class' => 'btn btn-primary btn-block')) }}</p>

                        {{ Form::close() }}
                    </div>
                    <div class="alert alert-info inform" role="alert">
                        <p><small>Mês: lista todas as analises do mês informado</small></p>
                        <p><small>Convenio: lista todas as analises do convenio informado</small></p>
                        <p><small>Mês+Descrição: lista todas as analises do convenio no mês informado</small></p>
                        <p><small>Nada Informado: lista todas as analises cadastradas</small></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <h1 class="text-center">Saídas</h1>
                    <div class="caption" id="3">
                        <h4>Pesquise <p class="glyphicon glyphicon-info-sign pull-right info"></p></h4>
                        {{ Form::open([
                           //"url" => "relatorio/consulta-saidas",
                           "url" => "relatorio",
                           "autocomplete" => "on",
                           "class" => "form-horizontal"
                        ]) }}

                        {{ Form::select('mes', [
                            '0' => 'Selecione Mes',
                            '1' => 'Janeiro',
                            '2' => 'Fevereiro',
                            '3' => 'Março',
                            '4' => 'Abril',
                            '5' => 'Maio',
                            '6' => 'Junho',
                            '7' => 'Julho',
                            '8' => 'Agosto',
                            '9' => 'Setembro',
                            '10' => 'Outubro',
                            '11' => 'Novembro',
                            '12' => 'Dezembro'
                        ], 0, ['class' => 'form-control']) }}
                        <p></p>
                        {{ Form::text('saida', isset($saida->descricao) ? $saida->descricao : Input::old('saida'), array('class' => 'form-control input-md', 'placeholder' => 'Descrição da saída.')) }}
                        <p></p>
                        <p class="align-center">{{ Form::submit('Buscar', array('class' => 'btn btn-primary btn-block')) }}</p>

                        {{ Form::close() }}
                    </div>
                    <div class="alert alert-info inform" role="alert">
                        <p><small>Mês: lista todas as saídas do mês informado</small></p>
                        <p><small>Descrição: lista todas as saídas da descrição informado</small></p>
                        <p><small>Mês+Descrição: lista todas as saídas no mês informado</small></p>
                        <p><small>Nada Informado: lista todas as saídas cadastradas</small></p>
                    </div>
                </div>
            </div>
        </div>




    @if(isset($relatorios))
        <div class="container col-md-12">
            <h3>Lista de Saidas </h3>
            <hr>
            <div class="row">
                <div class="panel panel-primary filterable">
                    <div class="panel-heading">
                        <h3 class="panel-title">Saidas</h3>
                        <div class="pull-right">
                            <a href="{{ URL::to('saida/create') }}" class="btn btn-success btn-xs add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>
                            <button class="btn btn-default btn-xs btn-filter "><span class="glyphicon glyphicon-filter"></span> Filter</button>
                        </div>
                    </div>
                    <table class="table" id="mytable" >
                        <thead>
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="#" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Descrição" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Valor" disabled></th>
                            <th colspan="2">Ações</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($saidas as $saida)

                            <tr>
                                <td>{{ $saida->id }}</td>
                                <td>{{ $saida->descricao }}</td>
                                <td class="valor">{{ $saida->valor }}</td>

                                <td colspan="2">

                                    <a class="btn btn-primary btn-xs" href="{{ URL::to('saida/' . $saida->id . '/edit') }}"><i class="glyphicon glyphicon-pencil"></i></a>

                                    {{ Form::open(array('url' => 'saida/' . $saida->id, 'class' => 'pull-right')) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('x', array('class' => 'btn btn-xs btn-danger')) }}
                                    {{ Form::close() }}

                                </td>

                            </tr>

                        @endforeach


                        </tbody>
                    </table>

                </div>
                {{ '<span class="badge pull-right">Registros '.$qtd.'</span>' .$saidas->links()  }}
            </div>
        </div>
    @endif



@stop

@section('scripts')

    <script type="text/javascript">

        $(document).ready(function(){

            //mascara para exibição jquery
            $('.valor').mask('00.00');
            $('.data').mask('00/00/0000');



        });

    </script>
@stop
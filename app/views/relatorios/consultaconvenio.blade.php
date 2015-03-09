
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
<div class="container">
    @foreach($recibos_get_m as $recM)
        {{ $recM->funcionario->nome }}
    @endforeach
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



<?php

use \Pdf\RelatorioPdf as Rpdf;

class RelatoriosController extends BaseController
{

    public function  getIndex()
    {
        $convenio_options = array('' => 'Selecione Convenio') + Convenio::lists('nome', 'id');
        return View::make('relatorios.index')->with('convenio_options', $convenio_options);
    }

    /**
     * @return consulta relatorio index
     */
    public  function postConsultaCliente()
    {
        $mes = Input::get('mes');
        $nome = Input::get('nome');

        /*
        if($mes != '' and $nome != '') {
            $recibo = DB::table('recibos')
                ->join('clientes', function ($join) {
                $join->on('recibos.cliente_id', '=', 'clientes.id')
                    ->where('clientes.nome', 'LIKE', '%' . Input::get('nome') . '%');
                })
                ->whereRaw('MONTH(recibos.created_at) = ?', [$mes])->get();
        }

        if($mes != '' and $nome == '')
        {
            $recibo = DB::table('recibos')->join('clientes', function ($join) {
                $join->on('recibos.cliente_id', '=', 'clientes.id')
                    ->where('clientes.nome', 'LIKE', '%' . Input::get('nome') . '%');
            })
                ->whereRaw('MONTH(recibos.created_at) = ?', [$mes])->get();
        }
        */
        if($nome != '' and $mes != 0) {
            $recibos = Recibo::with('convenio', 'funcionario', 'analise')
                ->whereHas('cliente', function ($q) {
                    $q->where('nome', 'like', '%' . Input::get('nome') . '%');

                })->whereRaw('MONTH(recibos.created_at) = ?', [$mes])->get();

        }
        if($nome!= '' and $mes == 0) {
            $recibos = Recibo::with('convenio', 'funcionario', 'analise')
                ->whereHas('cliente', function ($q) {
                    $q->where('nome', 'like', '%' . Input::get('nome') . '%');

                })->get();

        }
        if($mes != 0 and $nome == '') {
            $recibos = Recibo::with('convenio', 'funcionario', 'analise', 'cliente')
                ->whereRaw('MONTH(recibos.created_at) = ?', [$mes])->get();

        }
        if($mes == 0 and $nome == '') {
            $recibos = Recibo::with('convenio', 'funcionario', 'analise', 'cliente')
                ->orderBy('created_at', 'desc')->get();

        }

        return View::make('relatorios.teste',compact('recibos'));



    }

    /**
     * @return Recibos por $mes
     */
    public function postConsultaConvenio()
    {
        $mes = Input::get('mes');
        $conv = Input::get('convenio');
        if($conv != '' and $mes != 0) {
            $recibos = Recibo::with('cliente', 'funcionario', 'analise')
                ->whereHas('convenio', function ($q) {
                    $q->where('nome', 'like', '%' . Input::get('nome') . '%');

                })->whereRaw('MONTH(recibos.created_at) = ?', [$mes])->get();

        }
        if($conv != '' and $mes == 0) {
            $recibos = Recibo::with('cliente', 'funcionario', 'analise')
                ->whereHas('convenio', function ($q) {
                    $q->where('nome', 'like', '%' . Input::get('nome') . '%');

                })->get();

        }
        if($mes != 0 and $conv == '') {
            $recibos = Recibo::with('convenio', 'funcionario', 'analise', 'cliente')
                ->whereRaw('MONTH(recibos.created_at) = ?', [$mes])->get();

        }
        if($mes == 0 and $nome == '') {
            $recibos = Recibo::with('convenio', 'funcionario', 'analise', 'cliente')
                ->orderBy('created_at', 'desc')->get();

        }

       return View::make('relatorios.consultaconvenio')->with('recibos_get_m', $recibos_get_m);
    }

    public function postConsultaSaidas()
    {
        $mes = Input::get('mes');
        $saida = Input::get('saida');
        if($nome != '' and $mes != 0) {
            $saidas = Saida::where('descricao', 'like', '%' . Input::get('saida') . '%')
                ->whereRaw('MONTH(recibos.created_at) = ?', [$mes])->get();
            return "mes e nome";
        }
        if($saida != '' and $mes == 0) {
            $saidas = Saida::where('nome', 'like', '%' . Input::get('nome') . '%')->get();
            return "nome";
        }
        if($mes != 0 and $saida == '') {
            $recibos = Saida::whereRaw('MONTH(recibos.created_at) = ?', [$mes])->get();
            return "mes";
        }
        if($mes == 0 and $saida == '') {
            $recibos = Recibo::all()
                ->orderBy('created_at', 'desc')->get();
            return "todos";
        }
    }

    public function postIndex()
    {
        return "teste index post";
    }

    public function getRelatorioConvenio($convenio, $mes)
    {
        $relConv = Recibo::where('')->get();
    }


    public function getPrintPdf()
    {

        $fPdf = new Rpdf();
        $fPdf->AddPage();
        $fPdf->AliasNbPages();


        $fPdf->SetFont('Arial','B',8);
        $y = 75; // AQUI EU COLOCO O Y INICIAL DOS DADOS

        $l=5; // ALTURA DA LINHA
        $recibos = Recibo::first();


// largura padrão das colunas
        $largura = 40;
// altura padrão das linhas das colunas
        $altura = 6;
        $fPdf->Ln($altura);

// criando os cabeçalhos para 5 colunas
        $fPdf->Cell(12, $altura, 'Codigo', 1, 0, 'L');
        $fPdf->Cell(70, $altura, 'Cliente', 1, 0, 'L');
        $fPdf->Cell($largura, $altura, 'E-mail', 1, 0, 'L');
        $fPdf->Cell($largura, $altura, 'Telefone', 1, 0, 'L');
        $fPdf->Cell(15, $altura, 'Valor', 1, 0, 'C');

// pulando a linha
        $fPdf->Ln($altura);

// tirando o negrito
        $fPdf->SetFont('Arial', '', 7);






        foreach($recibos->analise as $analise){

        // ENQUANTO OS DADOS VÃO PASSANDO, O FPDF VAI INSERINDO OS DADOS NA PAGINA

            $dados1 = $analise->pivot->gleba;
            $dados2 = utf8_decode($analise->descricao); // NESTE CASO, EU DECODIFIQUEI OS DADOS, POIS É UM CAMPO DE TEXTO.
            $dados3 = $analise->valor;
            $dados4 = $recibos->cliente->nome;
            $dados5 = $recibos->cliente->nome;
            $dados6 = $recibos->cliente->nome;
            $dados7 = $recibos->cliente->nome;

            $l = 5 * Rpdf::contaLinhas($recibos,48);

            // Eu criei a função "contaLinhas" para contar quantas linhas um campo pode conter se tiver largura = 48


                if($y + $l >= 230){           // 230 É O TAMANHO MAXIMO ANTES DO RODAPE

                    $fPdf->AddPage();   // SE ULTRAPASSADO, É ADICIONADO UMA PÁGINA
                    // largura padrão das colunas
                    $largura = 40;
// altura padrão das linhas das colunas
                    $altura = 6;
                    $fPdf->Ln($altura);
                    $fPdf->SetFont('Arial','B',8);

// criando os cabeçalhos para 5 colunas
                    $fPdf->Cell(12, $altura, 'Codigo', 1, 0, 'L');
                    $fPdf->Cell(70, $altura, 'Cliente', 1, 0, 'L');
                    $fPdf->Cell($largura, $altura, 'E-mail', 1, 0, 'L');
                    $fPdf->Cell($largura, $altura, 'Telefone', 1, 0, 'L');
                    $fPdf->Cell(15, $altura, 'Valor', 1, 0, 'C');

// pulando a linha
                    $fPdf->Ln($altura);
                    $y=75;             // E O Y INICIAL É RESETADO

                }

            //DADOS
            $fPdf->SetY(75);
            $fPdf->SetX(10);
            $fPdf->Rect(10,$y,70,$l);
            $fPdf->MultiCell(70,6,"teste",0,2); // ESTA É A CELULA QUE PODE TER DADOS EM MAIS DE UMA LINHA
            $fPdf->SetFont('Arial','',6);
            $fPdf->SetY($y);
            $fPdf->SetX(20);
            $fPdf->Rect(20,$y,31,$l);
            $fPdf->MultiCell(31,6,$dados2,0,2);
            $fPdf->SetY($y);
            $fPdf->SetX(51);
            $fPdf->Rect(51,$y,10,$l);
            $fPdf->MultiCell(10,5,$dados3,0,2);
            $fPdf->Ln();
            $y += $l;


        }


        $fPdf->Output();
        Header('Pragma: public');
        $headers = ['Content-Type' => 'application/pdf'];

        return Response::make($fPdf->Output(), 200, $headers);
    }

}
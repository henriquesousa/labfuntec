<?php namespace Pdf;

use \Pdf\RelatorioPdf as Rpdf;
use Symfony\Component\HttpFoundation\AcceptHeader;


class Cliente extends RelatorioPdf
{


    public static function getRelatorioAllClientes($recibos, $analiseV)
    {
        $pdf = new Rpdf;
        $pdf->AddPage();
        $pdf->AliasNbPages();
        // -- header
        $pdf->SetFont('Arial','B',12);
        $y = 75; // AQUI EU COLOCO O Y INICIAL DOS DADOS
        $l=5; // ALTURA DA LINHA
        $pdf->SetTextColor(68, 68, 68);
        $pdf->SetFillColor(52, 191, 73);
        $pdf->Cell(190,7,utf8_decode('Relatório de Recibos'),0,0,'C',1);
        $pdf->Ln();

        $largura = 40;
        $altura = 6;
        $pdf->Ln($altura);
        $pdf->SetFont('Arial','B',8);
        $pdf->SetTextColor(68, 68, 68);
        $pdf->SetFillColor(5, 204, 71);

        // criando os cabeçalhos para 5 colunas
        $pdf->SetX(16);
        $pdf->Cell(8, $altura, utf8_decode('Cod'), 0, 0, 'C', true);
        $pdf->Cell(70, $altura, 'Cliente', 0, 0, 'C', true);
        $pdf->Cell($largura, $altura, utf8_decode('Convêvio'), 0, 0, 'C', true);
        $pdf->Cell(10, $altura, 'Gleba', 0, 0, 'C', true);
        $pdf->Cell(18, $altura, 'Analise', 0, 0, 'C', true);
        $pdf->Cell(12, $altura, 'Valor', 0, 0, 'C', true);
        $pdf->Cell(20, $altura, 'Pagamento', 0, 0, 'C', true);
        // pulando a linha
        $pdf->Ln($altura);

        // tirando o negrito
        $pdf->SetFont('Arial', '', 7);

        /**
         * Looping para exibiçao dos objetos
         * @recibos Illuminate\Database\Eloquent
         */

        foreach($recibos as $recibo) {
            foreach ($recibo->analise as $analise) {
                $dados1 = $recibo->id;
                $dados2 = utf8_decode($recibo->cliente->nome);
                $dados3 = utf8_decode($recibo->convenio->nome);
                $dados4 = $analise->pivot->gleba;
                $dados5 = $analise->descricao;
                $dados6 = $analise->valor;
                //DADOS
                $pdf->SetFont('Arial', '', 7);
                $pdf->SetFillColor(242, 242, 242);
                $pdf->SetX(16);
                $pdf->Cell(8, $altura, $dados1, 1, 0, 'L',1);
                $pdf->Cell(70, $altura, $dados2, 1, 0, 'L',1);
                $pdf->Cell($largura, $altura, $dados3, 1, 0, 'L',1);
                $pdf->Cell(10, $altura, $dados4, 1, 0, 'L',1);
                $pdf->Cell(18, $altura, $dados5, 1, 0, 'L',1);
                $pdf->Cell(12, $altura, $dados6.',00', 1, 0, 'L',1);

                if($recibo->pagamento == 1){
                    $image1 = 'site/img/accept.png';
                }
                else {
                    $image1 = 'site/img/remove.png';
                }
                $pdf->Cell( 20, $altura, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 3), 1, 0, 'R',0);
                $pdf->Ln();
                $y += $l;

                //$ll = 5 * Rpdf::contaLinhas($recibo, 48);
                // Eu criei a função "contaLinhas" para contar quantas linhas um campo pode conter se tiver largura = 48
                // 230 É O TAMANHO MAXIMO ANTES DO RODAPE
                //if (($y + $ll) >= 230) {

                /**
                 * @$y é a soma dos tamanhos das linhas
                 * o espaço reservado para apresentração é 240 cm
                 * utilizo 10cm como margem antes do rodapé
                 */
                if ($y > 230) {

                    $pdf->AddPage();   /** Add nova pagina enaunto o $y > 230cm */
                    $pdf->SetFont('Arial','B',8);
                    $pdf->SetTextColor(68, 68, 68);
                    $pdf->SetFillColor(52, 191, 73);
                    $pdf->Cell(190,7,utf8_decode('Relatório de Recibos'),0,0,'C',1);
                    $pdf->Ln();

                    $altura = 6; /** altura da linha */
                    $pdf->Ln($altura);
                    $pdf->SetX(16);
                    $pdf->SetFont('Arial','B',8);
                    $pdf->SetTextColor(68, 68, 68);
                    $pdf->SetFillColor(5, 204, 71);

                    // criando os cabeçalhos para 5 colunas
                    $pdf->SetX(16);
                    $pdf->Cell(8, $altura, utf8_decode('Cod'), 0, 0, 'C', true);
                    $pdf->Cell(70, $altura, 'Cliente', 0, 0, 'C', true);
                    $pdf->Cell($largura, $altura, utf8_decode('Convêvio'), 0, 0, 'C', true);
                    $pdf->Cell(10, $altura, 'Gleba', 0, 0, 'C', true);
                    $pdf->Cell(18, $altura, 'Analise', 0, 0, 'C', true);
                    $pdf->Cell(12, $altura, 'Valor', 0, 0, 'C', true);
                    $pdf->Cell(20, $altura, 'Pagamento', 0, 0, 'C', true);
                    $pdf->Ln($altura);
                    $y = 75;             // E O Y INICIAL É RESETADO

                }
                // counts
                $quimica = $analise->pivot->orWhereIn('analise_id', [1])->count();
                $fisica = $analise->pivot->orWhereIn('analise_id', [2])->count();
                $completa = $analise->pivot->orWhereIn('analise_id', [3])->count();
                $diferenciada = $analise->pivot->orWhereIn('analise_id', [4])->count();
                //counts />


            }


        }

        $tot = ($quimica * $analiseV[0]['valor']) + ($fisica * $analiseV[1]['valor']) + ($completa * $analiseV[2]['valor']) + ($diferenciada * $analiseV[3]['valor']);

        $pdf->Ln();
        $pdf->SetX(45);

        // criando os cabeçalhos para 5 colunas
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(0, 177, 64);
        $pdf->Cell(15, $altura, 'Recibos', 0, 0, 'C', 1);
        $pdf->Cell(20, $altura, utf8_decode('Química'), 0, 0, 'C', 1);
        $pdf->Cell(20, $altura, utf8_decode('Física'), 0, 0, 'C', 1);
        $pdf->Cell(20, $altura, utf8_decode('Completa'), 0, 0, 'C', 1);
        $pdf->Cell(20, $altura, 'Diferenciada', 0, 0, 'C', 1);
        $pdf->Cell(20, $altura, 'Valor Total', 0, 0, 'C', 1);

        $pdf->Ln();
        $pdf->SetTextColor(6, 47, 60);
        $pdf->SetFillColor(204, 215, 221);

        $pdf->SetX(45);
        $pdf->Cell(15, $altura, count($recibos), 1, 0, 'C',1);
        $pdf->Cell(20, $altura, $quimica, 1, 0, 'C',1);
        $pdf->Cell(20, $altura, $fisica, 1, 0, 'C',1);
        $pdf->Cell(20, $altura, $completa, 1, 0, 'C',1);
        $pdf->Cell(20, $altura, $diferenciada, 1, 0, 'C',1);
        $pdf->Cell(20, $altura, number_format($tot, 2, ',', '.'), 1, 0, 'C',1);

        $pdf->Output();
        Header('Pragma: public');
        $headers = ['Content-Type' => 'application/pdf'];
        return Response::make($pdf->Output(), 200, $headers);

    }

    /**
     * Return pdf the search date ans name client
     * @param $recibos
     * @param $analiseV
     * @return mixed
     */
    public static function getIsRelatorioCliente($recibos)
    {
        $contarc = array();
        foreach ($recibos as $value)
        {
            if (isset($contarc[$value->recibo_id]))
            {
                $contarc[$value->recibo_id] += 1;
            }
            else
            {
                $contarc[$value->recibo_id] = 1;
            }
        }
        $tot_rc = count(array_keys($contarc));

        $contar = array();
        foreach ($recibos as $value)
        {
            if (isset($contar[$value->analise_id]))
            {
                $contar[$value->analise_id] += 1;
                $valor[$value->analise_id] = $value->valor;
            }
            else
            {
                $contar[$value->analise_id] = 1;
            }
        }

        $pdf = new Rpdf;
        $pdf->AddPage();
        $pdf->AliasNbPages();
        // -- header
        $pdf->SetFont('Arial','B',12);
        $y = 75; // AQUI EU COLOCO O Y INICIAL DOS DADOS
        $l=5; // ALTURA DA LINHA
        $pdf->SetTextColor(68, 68, 68);
        $pdf->SetFillColor(52, 191, 73);
        $pdf->Cell(190,7,utf8_decode('Relatório de Recibos'),0,0,'C',1);
        $pdf->Ln();


        $largura = 40;
        $altura = 6;
        $pdf->Ln($altura);
        $pdf->SetFont('Arial','B',8);
        $pdf->SetTextColor(68, 68, 68);
        $pdf->SetFillColor(5, 204, 71);

        // criando os cabeçalhos para 5 colunas
        $pdf->SetX(16);
        $pdf->Cell(8, $altura, utf8_decode('Cod'), 0, 0, 'C', true);
        $pdf->Cell(70, $altura, 'Cliente', 0, 0, 'C', true);
        $pdf->Cell($largura, $altura, utf8_decode('Convêvio'), 0, 0, 'C', true);
        $pdf->Cell(10, $altura, 'Gleba', 0, 0, 'C', true);
        $pdf->Cell(18, $altura, 'Analise', 0, 0, 'C', true);
        $pdf->Cell(12, $altura, 'Valor', 0, 0, 'C', true);
        $pdf->Cell(20, $altura, 'Pagamento', 0, 0, 'C', true);
        // pulando a linha
        $pdf->Ln($altura);

        // tirando o negrito
        $pdf->SetFont('Arial', '', 7);

        /**
         * Looping para exibiçao dos objetos
         * @recibos Illuminate\Database\Eloquent
         */

        foreach($recibos as $recibo) {
            //dd($recibo);
            $dados1 = $recibo->recibo_id;
            $dados2 = utf8_decode($recibo->cli_nome);
            $dados3 = utf8_decode($recibo->conv_nome);
            $dados4 = $recibo->gleba;
            $dados5 = $recibo->descricao;
            $dados6 = $recibo->valor;
            //DADOS
            $pdf->SetFont('Arial', '', 7);
            $pdf->SetFillColor(242, 242, 242);
            $pdf->SetX(16);
            $pdf->Cell(8, $altura, $dados1, 1, 0, 'L',1);
            $pdf->Cell(70, $altura, $dados2, 1, 0, 'L',1);
            $pdf->Cell($largura, $altura, $dados3, 1, 0, 'L',1);
            $pdf->Cell(10, $altura, $dados4, 1, 0, 'L',1);
            $pdf->Cell(18, $altura, $dados5, 1, 0, 'L',1);
            $pdf->Cell(12, $altura, $dados6.',00', 1, 0, 'L',1);
            if($recibo->pagamento == 1){
                $image1 = 'site/img/accept.png';
            }
            else {
                $image1 = 'site/img/remove.png';
            }
            $pdf->Cell( 20, $altura, '  '.$pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 3), 1, 0, 'C',0);
            $pdf->Ln();
            $y += $l;

            /**
             * @$y é a soma dos tamanhos das linhas
             * o espaço reservado para apresentração é 240 cm
             * utilizo 10cm como margem antes do rodapé
             */
            if ($y > 230) {

                $pdf->AddPage();   /** Add nova pagina enaunto o $y > 230cm */
                $pdf->SetFont('Arial','B',8);
                $pdf->SetTextColor(68, 68, 68);
                $pdf->SetFillColor(52, 191, 73);
                $pdf->Cell(190,7,utf8_decode('Relatório de Recibos'),0,0,'C',1);
                $pdf->Ln();

                $altura = 6; /** altura da linha */
                $pdf->Ln($altura);
                $pdf->SetX(16);
                $pdf->SetFont('Arial','B',8);
                $pdf->SetTextColor(68, 68, 68);
                $pdf->SetFillColor(5, 204, 71);

                // criando os cabeçalhos para 5 colunas
                $pdf->SetX(16);
                $pdf->Cell(8, $altura, utf8_decode('Cod'), 0, 0, 'C', true);
                $pdf->Cell(70, $altura, 'Cliente', 0, 0, 'C', true);
                $pdf->Cell($largura, $altura, utf8_decode('Convêvio'), 0, 0, 'C', true);
                $pdf->Cell(10, $altura, 'Gleba', 0, 0, 'C', true);
                $pdf->Cell(18, $altura, 'Analise', 0, 0, 'C', true);
                $pdf->Cell(12, $altura, 'Valor', 0, 0, 'C', true);
                $pdf->Cell(20, $altura, 'Pagamento', 0, 0, 'C', true);
                $pdf->Ln($altura);
                $y = 75;             // E O Y INICIAL É RESETADO

            }

        }

        $pdf->Ln();
        $pdf->SetX(45);

        // criando os cabeçalhos para 5 colunas
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(0, 177, 64);
        $pdf->Cell(15, $altura, 'Recibos', 0, 0, 'C', 1);
        $pdf->Cell(20, $altura, utf8_decode('Física'), 0, 0, 'C', 1);
        $pdf->Cell(20, $altura, utf8_decode('Química'), 0, 0, 'C', 1);
        $pdf->Cell(20, $altura, utf8_decode('Completa'), 0, 0, 'C', 1);
        $pdf->Cell(20, $altura, 'Diferenciada', 0, 0, 'C', 1);
        $pdf->Cell(20, $altura, 'Valor Total', 0, 0, 'C', 1);

        $pdf->Ln();
        $pdf->SetTextColor(6, 47, 60);
        $pdf->SetFillColor(204, 215, 221);

        $pdf->SetX(45);
        $pdf->Cell(15, $altura, $tot_rc, 1, 0, 'C',1);
        foreach ($contar as $key => $value) {
            $pdf->Cell(20, $altura, $value, 1, 0, 'C', 1);
        }

        $tot = ($contar[1] * $valor[1]) +
               ($contar[2] * $valor[2]) +
               ($contar[3] * $valor[3]) +
               ($contar[4] * $valor[4]);

        $pdf->Cell(20, $altura, number_format($tot, 2, ',', '.'), 1, 0, 'C',1);

        $pdf->Output();
        Header('Pragma: public');
        $headers = ['Content-Type' => 'application/pdf'];
        return Response::make($pdf->Output(), 200, $headers);
    }

}
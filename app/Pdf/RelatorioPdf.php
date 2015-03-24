<?php namespace Pdf;

use Anouar\Fpdf\Fpdf;

class RelatorioPdf extends Fpdf {

    function Header(){ //CABECALHO
        global $codigo; // EXEMPLO DE UMA VARIAVEL QUE TERÁ O MESMO VALOR EM QUALQUER ÁREA DO PDF.
        $l=5; // DEFINI ESTA VARIAVEL PARA ALTURA DA LINHA
        $this->SetXY(10,10); // SetXY - DEFINE O X E O Y NA PAGINA
        $this->Rect(10,10,190,270); // CRIA UM RETÂNGULO QUE COMEÇA NO X = 10, Y = 10 E
        //TEM 190 DE LARGURA E 280 DE ALTURA.
        //NESTE CASO, É UMA BORDA DE PÁGINA.

        $this->Image('site/img/logo.jpg',11,11,40); // INSERE UMA LOGOMARCA NO PONTO X = 11, Y = 11, E DE TAMANHO 40.
        $this->SetFont('Arial','B',8); // DEFINE A FONTE ARIAL, NEGRITO (B), DE TAMANHO 8

        $this->Cell(190,5,utf8_decode('Ministério da Agricultura Pecuária e Abastecimento'),'C',0,'C');
        $this->Ln();
        $this->Cell(190,5,utf8_decode('Convênio: COOPERCAFÉ | UNEC - BR 116 KM 526 - Bairro das Graças'),'C',0,'C');
        $this->Ln();
        $this->Cell(190,5,utf8_decode('Telefax:(33) 3321-1959 - CEP: 35.300-970 - Caratinga MG'),'C',0,'C');
        $this->Ln();
        $this->Cell(190,5,utf8_decode('E-mail: gerencia@labfuntec.com.br - atendimento@labfuntec.com.br'),'C',0,'C');
        // CRIA UMA CELULA COM OS SEGUINTES DADOS, RESPECTIVAMENTE:
        // LARGURA = 170,
        // ALTURA = 15,
        // TEXTO = 'INSIRA SEU TEXTO AQUI'
        // BORDA = 0. SE = 1 TEM BORDA SE 'R' = RIGTH, 'L' = LEFT, 'T' = TOP, 'B' = BOTTOM
        // QUEBRAR LINHA NO FINAL = 0 = NÃO
        // ALINHAMENTO = 'L' = LEFT


        $this->Ln(); // QUEBRA DE LINHA

        $this->Cell(190,10,'',0,0,'L');
        $this->Ln();
        $l = 17;
        $this->SetFont('Arial','B',12);
        $this->SetXY(10,30);
        $this->Cell(190,$l,utf8_decode('LAB-FUNTEC'),'B',1,'C');

        $this->Cell(190,2,'',0,0,'C');
        //ESPAÇAMENTO DO CABECALHO PARA A TABELA
        $this->Ln();
    }

    function Footer(){ // CRIANDO UM RODAPE

        $this->SetXY(15,262);
        $this->Rect(10,270,190,10);
        $this->Ln();
        $this->SetFont('Arial','',7);
        $this->Cell(150,15,utf8_decode('Página '.$this->PageNo().' de {nb}'),0,0,'C');
        $this->Cell(15,15,'Data:',0,0,'L');
        $this->Cell(20,15,date('d/m/Y'),0,0,'L'); // INSIRO A DATA CORRENTE NA CELULA

    }

    static function contaLinhas($text, $maxwidth){

        $lines = 0;
        if($text==''){
            $cont = 1;
        }else{
            $cont = strlen($text);
        }
        if($cont < $maxwidth){
            $lines = 1;
        }else{
            if($cont % $maxwidth > 0){
                $lines = ($cont / $maxwidth) + 1;
            }else{
                $lines = ($cont / $maxwidth);
            }
        }
        $lines += substr_count(str_replace(array("\r\n", "\r", "\n"),'<br />',$text),'<br />');
        //$lines = $lines + substr_count(nl2br2($text),'<br/>');
        //dd($lines);
        return $lines;
    }


}
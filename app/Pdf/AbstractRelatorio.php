<?php

namespace Pdf;

abstract class AbstractRelatorio {

    abstract protected function getRelatorioPdf();
    /**
     * Cabeçalho do Relatorio
     */
    abstract protected function Header();


    function Footer()
    {
        $this->SetXY(15,262);
        $this->Rect(10,270,190,10);
        $this->Ln();
        $this->SetFont('Arial','',7);
        $this->Cell(150,15,utf8_decode('Página '.$this->PageNo().' de {nb}'),0,0,'C');
        $this->Cell(15,15,'Data:',0,0,'L');
        $this->Cell(20,15,date('d/m/Y'),0,0,'L'); // INSIRO A DATA CORRENTE NA CELULA
    }
}
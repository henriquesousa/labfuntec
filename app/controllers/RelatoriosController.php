<?php

class RelatoriosController extends BaseController {


    public function getPrintPdf()
    {

        $fPdf = new Fpdf('P', 'pt', 'A4');
        $fPdf->AddPage();

        // header
        $fPdf->SetFont('Arial','B',15);
        $fPdf->Cell(540,40,'LABORATÓRIO DE ANALISE DE SOLOS - FUNTEC',1,1,'C');
        $fPdf->Ln(20);
        // /header

        $fPdf->SetFont('Arial','B',14);
        $fPdf->Cell(0,10,'Powered by FPDF.',0,1,'C');


        $fPdf->SetFont('Arial','B',12);
        $fPdf->Cell(40,10,'Hello World!',0,1,'C');

        /* footer */
        $fPdf->SetY(-15);
        $fPdf->SetFont('Arial','I',8);
        $fPdf->Cell(0,10,'Pagina: '.$fPdf->PageNo().'',0,0,'C');
        /* /footer */

        $fPdf->Output();
        $headers = ['Content-Type' => 'application/pdf'];

        return Response::make($fPdf->Output(), 200, $headers);
    }

}
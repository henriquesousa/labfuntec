<?php

use \Pdf\RelatorioPdf as Rpdf;
use Validators\ReciboValidator as ReciboValidator;

class RecibosController extends BaseController {

	public function __construct(ReciboRepositoryInterface $recibos, EnderecoRepositoryInterface $endereco,
                                AnaliseRepositoryInterface $analise)
    {
        $this->recibos = $recibos;
        $this->endereco = $endereco;
        $this->analise = $analise;
		$this->beforeFilter('csrf', array('on'=>'post'));
		
	}

	/**
	 * Display a listing of recibos
	 *
	 * @return Response
	 */

	public function index()
	{
        $recibos = $this->recibos->reciboOrderBy('id', 'DESC', '15');
		$qtd = count($recibos);

		return View::make('recibos.list', compact('recibos', 'qtd'));
	}

	
	/**
	 * Show the form for creating a new recibo
	 *
	 * @return Response
	 */
	public function create()
	{
		$clientes = Cliente::all();
		$convenios = Convenio::all();
		$analises = $this->analise->getAnaliseAll();

		return View::make('recibos.create', compact('clientes', 'convenios', 'analises'));
	}

	/**
	 * Store a newly created funcionario in storage.
	 * @
	 * @return Response
	 */
	public function store()
	{
        $inputs = Input::all();
        $validator = new ReciboValidator;
        if ($validator->validate($inputs, 'create')) {
            $recibos = $this->recibos->postRecibo($inputs);

            /**
             * Verify if exists key in array
             * @param key $i
             * @param array $inputs['analise']
             */
            $i = 1;
            while(array_key_exists($i, $inputs['analise']))
            {
                $this->endereco->postEndereco($recibos, $inputs, $i);
                $this->recibos->reciboAttach($recibos, 'analise',$inputs['analise'], 'gleba', $i);
                $i ++;
            }
            return Redirect::to('recibo');
        }

        // falha na validação
        $errors = $validator->errors();
        return Redirect::back()->withErrors($errors)->withInput();

	}

	/**
	 * Display the specified funcionario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$recibo = $this->recibos->getReciboFoF($id);
        return View::make('recibos.print', compact('recibo'));

	}

	/**
	 * Show the form for editing the specified funcionario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return Redirect::to('recibo');
	}

	/**
	 * Update the specified recibo in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		/*
		$input = Input::get();
		//dd($input);

		$validator = new ReciboValidator;

		$recibo = $this->recibos->getReciboFoF($input['id']);

		if ($validator->validate($input, 'update')) {

		    $recibo->labref = Input::get("labref");
			//$recibo->saida = $saida(add(new DateInterval( "P10D" )));
			$recibo->cliente_id = Input::get("cliente");
			/$recibo->funcionario_id = Auth::user()->id;
			$recibo->convenio_id = Input::get("convenio");
			$recibo->pagamento = Input::get("pagamento");
			$recibo->status = Input::get("status");


			return Redirect::route('recibos');
		}

		
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();
		*/

		return Redirect::to('recibo');
	}

	/**
	 * Remove the specified recibo from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$recibo = $this->recibos->getReciboFoF($id);
        $anRec  = $this->analise->deleteAnaliseReciboByRecibo($id);
        $endRec = $this->endereco->deleteEnderecoByRecibo($id);
		$recibo->delete();

		return Redirect::to('recibo');
	}

    /**
     *  Relatorios FPDF
     */
    public function getPrintPdf()
    {

        $fPdf = new Rpdf();
        $fPdf->AddPage();
        $fPdf->AliasNbPages();



        $fPdf->SetFont('Arial','',8);
        $y = 75; // AQUI EU COLOCO O Y INICIAL DOS DADOS

        $l=5; // ALTURA DA LINHA
        $clientes = Recibo::all();
        foreach($clientes as $cliente){

            // ENQUANTO OS DADOS VÃO PASSANDO, O FPDF VAI INSERINDO OS DADOS NA PAGINA

            $dados1 = $cliente->corrego;
            $dados2 = utf8_decode($cliente->cidade); // NESTE CASO, EU DECODIFIQUEI OS DADOS, POIS É UM CAMPO DE TEXTO.
            $dados3 = $cliente->corrego;
            $dados4 = $cliente->bairro;
            $dados5 = $cliente->corrego;
            $dados6 = $cliente->corrego;
            $dados7 = $cliente->corrego;

            $l = 5 * $this->contaLinhas($clientes,48);
            // Eu criei a função "contaLinhas" para contar quantas linhas um campo pode conter se tiver largura = 48


            if($y + $l >= 230){           // 230 É O TAMANHO MAXIMO ANTES DO RODAPE

                $fPdf->AddPage();   // SE ULTRAPASSADO, É ADICIONADO UMA PÁGINA
                $y=75;             // E O Y INICIAL É RESETADO

            }

            //DADOS
            $fPdf->SetY($y);
            $fPdf->SetX(10);
            $fPdf->Rect(10,$y,70,$l);
            $fPdf->MultiCell(70,6,$dados1,0,2); // ESTA É A CELULA QUE PODE TER DADOS EM MAIS DE UMA LINHA
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

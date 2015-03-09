<?php

use \Pdf\RelatorioPdf as Rpdf;
use Validators\ReciboValidator as ReciboValidator;

class RecibosController extends BaseController {

	public function __construct() {
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		
	}

	/**
	 * Display a listing of recibos
	 *
	 * @return Response
	 */

	public function index()
	{
		$recibos = Recibo::orderBy('id', 'DESC')->paginate(15);
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
		$analises = Analise::all();

		return View::make('recibos.create', compact('clientes', 'convenios', 'analises'));
	}

	/**
	 * Store a newly created funcionario in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = new ReciboValidator;

		$saida = new DateTime();


		if ($validator->validate($input, 'create')) {
		  	// validação OK
			$recibo = new Recibo();
            $recibo->labref = Input::get("labref");
			$recibo->saida = $saida->add(new DateInterval( "P10D" ));
			$recibo->cliente_id = Input::get("cliente");
			$recibo->funcionario_id = 1;//Auth::user()->id;
			$recibo->convenio_id = Input::get("convenio");
			$recibo->pagamento = Input::get("pagamento");
			$recibo->status = Input::get("status");
			$recibo->save();




			//dd($input['analise']);
            /**
             * verifica se existe a chave no array
             * parametro chave a ser verificada
             * segundo parametro array a ser pesquisado
            */
            $i = 1;
            while(array_key_exists($i, $input['analise']))
            {
                $endereco = new Endereco();
                $endereco->recibo_id = $recibo->id;
                $endereco->cidade = $input['cidade'.$i.''];
                $endereco->corrego = $input['corrego'.$i.''];
                $endereco->save();
                $recibo->analise()->attach($input['analise'][$i], ['gleba' => $i]);
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
		$recibo = Recibo::findOrFail($id);
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
		/*
		$recibo = Recibo::find($id);

		return View::make('recibos.edit', compact('recibo'));
		*/
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

		$recibo = Recibo::findOrFail($input['id']);

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
		$recibo = Recibo::findOrFail($id);
        $anRec = DB::table('analise_recibo')->where('recibo_id', $id)->delete();

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

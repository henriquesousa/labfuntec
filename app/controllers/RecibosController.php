<?php

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

		//dd($input['analise']);

		$validator = new ReciboValidator;

		$saida = new DateTime();

		
		if ($validator->validate($input, 'create')) {
		  	// validação OK
			$recibo = new Recibo();
			$recibo->saida = $saida->add(new DateInterval( "P10D" ));
			$recibo->cliente_id = Input::get("cliente");
			$recibo->funcionario_id = 1;//Auth::user()->id;
			$recibo->convenio_id = Input::get("convenio");
			$recibo->pagamento = Input::get("pagamento");
			$recibo->corrego = Input::get("corrego");
			$recibo->cidade = Input::get("cidade");
			$recibo->status = Input::get("status");
			$recibo->save();


			

			//dd($input['analise']);
			$recibo->analise()->sync($input['analise']);


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
		  
			//$recibo->saida = $saida(add(new DateInterval( "P10D" )));
			$recibo->cliente_id = Input::get("cliente");
			$recibo->funcionario_id = Auth::user()->id;
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

	
}

<?php

use Validators\AnaliseValidator as AnaliseValidator;

class AnalisesController extends BaseController {

	public function __construct() {
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		
	}

	/**
	 * Display a listing of clientes
	 *
	 * @return Response
	 */


	public function index()
	{
		$analises = Analise::orderBy('id', 'DESC')->paginate(25);
		$qtd = count($analises);

		return View::make('analises.index', compact('analises', 'qtd'));
	}

	/**
	 * Show the form for creating a new Cliente
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('analises.create');
	}

	/**
	 * Store a newly created Cliente in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = new AnaliseValidator;

		
		if ($validator->validate($input, 'create')) {
		  	// validação OK
			$analise = new Analise();
			$analise->descricao = ucwords(Input::get("descricao"));
			$analise->valor = Input::get("valor");
			$analise->save();

			return Redirect::to('analise');

		}
		
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();

	}

	/**
	 * Display the specified analise.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	
	}

	/**
	 * Show the form for editing the specified cliente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$analise = Analise::find($id);

		return View::make('analises.edit', compact('analise'));
	}

	/**
	 * Update the specified analise in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		//dd($input);

		$validator = new AnaliseValidator;

		$analise = Analise::findOrFail($id);

		if ($validator->validate($input, 'update')) {
		  // validação OK
			//$analise = analise::findOrFail(Input::get('id'));

			$analise->descricao = ucwords(Input::get("descricao"));
			$analise->valor = Input::get("valor");
			$analise->save();


			return Redirect::to('analise');
		}

		
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();
	}

	/**
	 * Remove the specified analise from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$analise = Analise::findOrFail($id);
		$analise->delete();

		return Redirect::to('analise');
	}

	
}

<?php

use Validators\SaidaValidator as SaidaValidator;

class SaidasController extends BaseController {

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
		$saidas = Saida::orderBy('id', 'DESC')->paginate(25);
		$qtd = count($saidas);

		return View::make('saidas.index', compact('saidas', 'qtd'));
	}

	/**
	 * Show the form for creating a new Cliente
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('saidas.create');
	}

	/**
	 * Store a newly created Cliente in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = new SaidaValidator;

		
		if ($validator->validate($input, 'create')) {
		  	// validação OK
			$saida = new Saida();
			$saida->descricao = ucwords(Input::get("descricao"));
			$saida->valor = Input::get("valor");
			$saida->save();

			return Redirect::to('saida');

		}
		
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();

	}

	/**
	 * Display the specified saida.
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
		$saida = Saida::find($id);

		return View::make('saidas.edit', compact('saida'));
	}

	/**
	 * Update the specified saida in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		//dd($input);

		$validator = new SaidaValidator;

		$saida = Saida::findOrFail($id);

		if ($validator->validate($input, 'update')) {
		  // validação OK
			//$saida = saida::findOrFail(Input::get('id'));

			$saida->descricao = ucwords(Input::get("descricao"));
			$saida->valor = Input::get("valor");
			$saida->save();


			return Redirect::to('saida');
		}

		
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();
	}

	/**
	 * Remove the specified saida from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$saida = Saida::findOrFail($id);
		$saida->delete();

		return Redirect::to('saida');
	}

	
}

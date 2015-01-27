<?php

use Validators\ConvenioValidator as ConvenioValidator;

class ConveniosController extends BaseController {

	public function __construct() {
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		
	}

	/**
	 * Display a listing of convenios
	 *
	 * @return Response
	 */


	public function index()
	{
		$convenios = Convenio::orderBy('id', 'ASC')->paginate(25);
		$qtd = count($convenios);

		return View::make('convenios.index', compact('convenios', 'qtd'));
	}

	/**
	 * Show the form for creating a new Cliente
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('convenios.create');
	}

	/**
	 * Store a newly created Cliente in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = new ConvenioValidator;

		
		if ($validator->validate($input, 'create')) {
		  	// validação OK
			$convenio = new Convenio();
			$convenio->nome = ucwords(Input::get("nome"));
			$convenio->email = Input::get("email");
			$convenio->phone = Input::get("phone");
			$convenio->save();

			return Redirect::to('convenio');

		}
		
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();

	}

	/**
	 * Display the specified cliente.
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
		$convenio = Convenio::find($id);

		return View::make('convenios.edit', compact('convenio'));
	}

	/**
	 * Update the specified convenio in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		//dd($input);

		$validator = new ConvenioValidator;

		$convenio = Convenio::findOrFail($id);

		if ($validator->validate($input, 'update')) {
		  // validação OK
			//$convenio = convenio::findOrFail(Input::get('id'));

			$convenio->nome = ucwords(Input::get("nome"));
			$convenio->email = Input::get("email");
			$convenio->phone = Input::get("phone");
			$convenio->save();


			return Redirect::to('convenio');
		}

		
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();
	}

	/**
	 * Remove the specified convenio from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$convenio = Convenio::findOrFail($id);
		$convenio->delete();

		return Redirect::to('convenio');
	}

	
}

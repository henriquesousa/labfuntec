<?php

use Validators\FuncionarioValidator as FuncionarioValidator;

class FuncionariosController extends BaseController {

	public function __construct() {
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		
	}

	/**
	 * Display a listing of funcionarios
	 *
	 * @return Response
	 */


	public function lists()
	{
		$funcionarios = Funcionario::orderBy('nome', 'ASC')->paginate(15);
		$qtd = count($funcionarios);

		return View::make('funcionarios.list', compact('funcionarios', 'qtd'));
	}

	/**
	 * Show the form for creating a new funcionario
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('funcionarios.create');
	}

	/**
	 * Store a newly created funcionario in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = new FuncionarioValidator;
		
		
		if (Input::get('codigo') == 'lab2015' and $validator->validate($input, 'create')) {
		  	// validação OK
			$funcionario = new Funcionario();
			$funcionario->nome = ucwords(Input::get("nome")." ".Input::get("sobrenome"));
			$funcionario->sexo = Input::get("sexo");
			$funcionario->email = Input::get("email");
			$funcionario->phone = Input::get("phone");
			$funcionario->username = Input::get("username");
			$funcionario->password = Hash::make(Input::get("password"));
			$funcionario->save();


			$credentials = [
				"username" => Input::get("username"),
				"password" => Input::get("password")
			];

			if (Auth::attempt($credentials))
			{
				return Redirect::route("funcionarios");
			}
			
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

		if (Request::ajax()) {
			$funci = Funcionario::find(Input::get('id'));
			return $funci;
		}
	}

	/**
	 * Show the form for editing the specified funcionario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$funcionario = Funcionario::find($id);

		return View::make('funcionarios.edit', compact('funcionario'));
	}

	/**
	 * Update the specified funcionario in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input = Input::get();
		//dd($input);

		$validator = new FuncionarioValidator;

		$funcionario = Funcionario::findOrFail($input['id']);

		if ($validator->validate($input, 'update')) {
		  // validação OK
			//$funcionario = Funcionario::findOrFail(Input::get('id'));

			$funcionario->nome = ucwords(Input::get("nome"));
			$funcionario->sexo = Input::get("sexo");
			$funcionario->email = Input::get("email");
			$funcionario->phone = Input::get("phone");
			$funcionario->username = Input::get("username");
			$funcionario->password = Hash::make(Input::get("password"));
			$funcionario->update();


			return Redirect::route('funcionarios');
		}

		
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();
	}

	/**
	 * Remove the specified funcionario from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$funcionario = Funcionario::findOrFail($id);
		$funcionario->delete();

		return Redirect::route('funcionarios');
	}

	
}

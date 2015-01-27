<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function index()
	{

		$clientes = Cliente::all();
		$qtd['cli'] = count($clientes);
		$convenios = Convenio::all();
		$qtd['conv'] = count($convenios);
		$analises = Analise::all();
		$qtd['anal'] = count($analises);
		$funcionarios = Funcionario::all();
		$qtd['fun'] = count($funcionarios);

		return View::make('index', compact('clientes', 'convenios', 'analises', 'funcionarios', 'qtd'));
	}

}

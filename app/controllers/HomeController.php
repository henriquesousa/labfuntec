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

		$categoria = Categoria::all();
		$qtd['cat'] = count($categoria);
		$produto = Produto::all();
		$qtd['prod'] = count($produto);
		$fornecedor = Fornecedor::all();
		$qtd['forn'] = count($fornecedor);
		$compra = Compra::all();
		$qtd['comp'] = count($compra);
		$funcionario = Funcionario::all();
		$qtd['funcionario'] = count($funcionario);

		return View::make('index', compact('categoria', 'produto', 'fornecedor', 'compra', 'funcionario', 'qtd'));
	}

}

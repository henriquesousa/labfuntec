<?php

use Validators\ClienteValidator as ClienteValidator;
use Pdf\Cliente as rCli;

class ClientesController extends BaseController {

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
		$clientes = Cliente::orderBy('id', 'ASC')->paginate(25);
		$qtd = count($clientes);

		return View::make('clientes.index', compact('clientes', 'qtd'));
	}

	/**
	 * Show the form for creating a new Cliente
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('clientes.create');
	}

	/**
	 * Store a newly created Cliente in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = new ClienteValidator;

		
		if ($validator->validate($input, 'create')) {
		  	// validação OK
			$cliente = new Cliente();
			$cliente->nome = ucwords(Input::get("nome")." ".Input::get("sobrenome"));
			$cliente->cpf = Input::get("cpf");
			$cliente->telefone = Input::get("telefone");
			$cliente->save();

			return Redirect::to('cliente');

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
		$cliente = Cliente::find($id);

		return View::make('clientes.edit', compact('cliente'));
	}

	/**
	 * Update the specified cliente in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		//dd($input);

		$validator = new ClienteValidator;

		$cliente = Cliente::findOrFail($id);

		if ($validator->validate($input, 'update')) {
		  // validação OK
			//$cliente = cliente::findOrFail(Input::get('id'));

			$cliente->nome = ucwords(Input::get("nome"));
			$cliente->cpf = Input::get("cpf");
			$cliente->telefone = Input::get("telefone");
			$cliente->save();


			return Redirect::to('cliente');
		}

		
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();
	}

	/**
	 * Remove the specified cliente from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
    {

        $recCliente = DB::table('recibos')->where('cliente_id', $id)->get();
        $ncli = count($recCliente);
        if ($ncli == 0)
        {
            $cli = Cliente::findOrFail($id);
            $cli->delete();
            return Redirect::to('cliente');
        }
        else
        {
            $errors['relacionado'] = "Cliente possui recibos cadastrados. Para excluir o cliente, os recibos do mesmo devem ser excluidos";
            return Redirect::back()->withErrors($errors)->withInput();
        }

	}

    public function getTeste()
    {
        return 'teste';
    }

	
}

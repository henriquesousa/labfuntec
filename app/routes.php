<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'UserController@login');

Route::get('/index', 'UserController@login');

Route::get('/sobre', function()
{
	return View::make('about');
});


/*
| Metodos da Classe UserController
*/
Route::any('/login',[
		"as"   => "login",
		"uses" => "UserController@login"
]);

Route::any('/logando',[
	"as"   => "logon",
	"uses" => "UserController@logon"
]);


Route::get('/logout', 'UserController@logout');
//--------------------------------------


//Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
Route::group(array('before' => 'auth'), function()
{
	
	Route::get('/index', 'HomeController@index');
	Route::get('/', 'HomeController@index');

	
	/*
	| Rotas para Funcionários
	*/

	Route::any('/funcionarioo', function()
	{
		return View::make('funcionarios.index');
	});

	Route::any('/funcionarios',[
		"as"   => "funcionarios",
		"uses" => "FuncionariosController@lists"
	]);

	Route::any("/funcionario/add", [
		"as" => "funcionario_add",
		"uses" => "FuncionariosController@create"
	]);

	Route::any("/funcionario/store", [
		"as" => "funcionario_store",
		"uses" => "FuncionariosController@store"
	]);

	Route::any('/funcionario/{id}',[
		"as"   => "funcionario",
		"uses" => "FuncionariosController@show"
	]);

	Route::any("/funcionario/edit/{id}", [
		"as" => "funcionario_editar",
		"uses" => "FuncionariosController@edit"
	]);

	Route::any("/funcionario/update/{id}", [
		"as" => "funcionario_update",
		"uses" => "FuncionariosController@update"
	]);

	Route::any("/funcionario/delete/{id}", [
		"as" => "funcionario_delete",
		"uses" => "FuncionariosController@destroy"
	]);

	


	Route::resource('recibo', 'RecibosController');
	Route::resource('cliente', 'ClientesController');
	Route::resource('convenio', 'ConveniosController');
	Route::resource('analise', 'AnalisesController');
	Route::resource('saida', 'SaidasController');

	

});
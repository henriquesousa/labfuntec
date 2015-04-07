<?php
Route::group(array('before' => 'guest'), function() {
    Route::get('/', 'UserController@login');
    Route::any('/request', [
        "as" => "user/request",
        "uses" => "UserController@request"
    ]);
    Route::any('/reset', [
        "as" => "user/reset",
        "uses" => "UserController@reset"
    ]);

    Route::get('/index', 'UserController@login');
    Route::any('/login', [
        "as" => "login",
        "uses" => "UserController@login"
    ]);
    Route::any('/logando', [
        "as" => "logon",
        "uses" => "UserController@logon"
    ]);


    Route::get('/sites', function () {
        return View::make('site.site');
    });

    Route::get('/sobre', function () {
        return View::make('site.site');
    });
});

//Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() //'before' => 'anbu.hide'
Route::group(array('before' => 'auth'), function()
{
	
	Route::get('/index', 'HomeController@index');
	Route::get('/', 'HomeController@index');
    Route::get('/logout', 'UserController@logout');

	
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
    Route::resource('recibos', 'RecibosController');
    Route::controller('relatorio', 'RelatoriosController');

	

});

/**
 * Binds
 */
App::bind('UserRepositoryInterface', 'UserRepository');
App::bind('ReciboRepositoryInterface', 'ReciboRepository');
App::bind('EnderecoRepositoryInterface', 'EnderecoRepository');
App::bind('AnaliseRepositoryInterface', 'AnaliseRepository');
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table) {
			
			$this
			->setTable($table)
			->addPrimary()
			->addString("nome")
			->addInteger("cpf")
			->addInteger("telefone");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('clientes');
	}

}

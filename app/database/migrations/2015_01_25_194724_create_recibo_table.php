<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReciboTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recibos', function(Blueprint $table)
		{
			$this
			->setTable($table)
			->addPrimary()
			->addDateTime("saida")			
			->addForeign('cliente_id', 'id', 'clientes')
			->addForeign('funcionario_id', 'id', 'funcionarios')
			->addForeign('convenio_id', 'id', 'convenios')
			->addInteger('status')
			->addInteger('pagamento')
			->addTimestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('recibos');
	}

}

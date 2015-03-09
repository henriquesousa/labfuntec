<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnaliseReciboTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('analise_recibo', function(Blueprint $table)
		{
			$this
			->setTable($table)
			->addPrimary()	
			->addForeign('analise_id', 'id', 'analises')
			->addForeign('recibo_id', 'id', 'recibos')
            ->addInteger('gleba');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('analises_recibos');
	}

}

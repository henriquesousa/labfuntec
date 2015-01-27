<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSaidaTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('saidas', function(Blueprint $table)
		{
			$this
			->setTable($table)
			->addPrimary()
			->addString("descricao")
			->addFloat("valor")
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
		Schema::dropIfExists('saidas');
	}

}

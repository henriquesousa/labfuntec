<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConvenioTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('convenios', function(Blueprint $table)
		{
			$this
			->setTable($table)
			->addPrimary()
			->addString("nome")
			->addString("email")
			->addInteger("phone");
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('convenios');
	}

}


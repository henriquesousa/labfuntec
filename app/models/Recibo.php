<?php

class Recibo extends \Eloquent {

	protected $softDelete = true;

	public $timestamps = true;

	protected $table = 'recibos';

	protected $garded = [
		"id"
	];

	protected $fillable = [
		"saida",
		"status",
		"pagamento",
		"corrego",
		"cidade",
		"cliente_id",
		"convenio_id",
		"funcionario_id"
	];


	//Relacionamentos

	public function analise()
	{
		return $this->belongsToMany('Analise', 'analise_recibo');
	}

	public function cliente()
	{
		return $this->belongsTo('Cliente');
	}

	public function convenio()
	{
		return $this->belongsTo('Convenio');
	}

	public function funcionario()
	{
		return $this->belongsTo('Funcionario');
	}
}
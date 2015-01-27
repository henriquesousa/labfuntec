<?php

class Saida extends \Eloquent {
	protected $softDelete = true;

	public $timestamps = true;

	protected $table = 'saidas';

	protected $garded = [
		"id"
	];

	protected $fillable = [
		"descricao",
		"valor"
	];


	//Relacionamentos

	public function recibo()
	{
		return $this->belongsToMany('Recibo', 'analise_recibo');
	}
}
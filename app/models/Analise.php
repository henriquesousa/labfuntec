<?php

class Analise extends Eloquent {
	protected $softDelete = true;

	public $timestamps = false;

	protected $table = 'analises';

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
		return $this->belongsToMany('Recibo')->withPivot('gleba');
	}
}
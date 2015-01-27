<?php

class Cliente extends \Eloquent {
	protected $softDelete = true;

	public $timestamps = false;

	protected $table = 'clientes';

	protected $garded = [
		"id"
	];

	protected $fillable = [
		"nome",
		"cpf",
		"telefone"
	];


	//Relacionamentos

	public function recibo()
    {
        return $this->hasMany('Recibo');
    }
}
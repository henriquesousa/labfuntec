<?php

class Convenio extends \Eloquent {
	protected $softDelete = true;

	public $timestamps = false;

	protected $table = 'convenios';

	protected $garded = [
		"id"
	];

	protected $fillable = [
		"nome",
		"email",
		"phone"
	];


	//Relacionamentos

	public function recibo()
    {
        return $this->hasMany('Recibo');
    }
}
<?php

class Endereco extends \Eloquent {

    protected $softDelete = true;

    public $timestamps = false;

    protected $table = 'enderecos';

    protected $garded = [
        "id"
    ];

    protected $fillable = [
        "recibo_id",
        "corrego",
        "cidade"
    ];


    //Relacionamentos

    public function analise()
    {
        return $this->belongsTo('Recibo');
    }

}
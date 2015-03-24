<?php

class Recibo extends Eloquent {

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


    public function scopeGetCliente($query, $type)
    {
        return $query->whereType($type);
    }

	//Relacionamentos

	public function analise()
	{
		return $this->belongsToMany('Analise')->withPivot('gleba')->orderBy('gleba', 'asc');
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

    public function endereco()
    {
        return $this->hasMany('Endereco');
    }
}
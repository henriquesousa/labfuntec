<?php

namespace Validators;

class AnaliseValidator extends BaseValidator
{
	/**
     * Regras de Validaçao para o Validator.
     *
     * @var array
     */
    protected $rules = [

        'create' => [
            'descricao' => ['required'],
            'valor' => ['required']
        ],

        'update' => [
            'descricao' => ['required'],
            'valor' => ['required']
        ]

    ];

    
}
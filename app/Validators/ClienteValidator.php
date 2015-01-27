<?php

namespace Validators;

class ClienteValidator extends BaseValidator
{
	/**
     * Regras de Validaçao para o Validator.
     *
     * @var array
     */
    protected $rules = [

        'create' => [
            'nome' => ['required']
        ],

        'update' => [
            'nome' => ['required']
        ]

    ];

    
}
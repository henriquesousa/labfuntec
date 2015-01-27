<?php

namespace Validators;

class ConvenioValidator extends BaseValidator
{
	/**
     * Regras de Validaçao para o Validator.
     *
     * @var array
     */
    protected $rules = [

        'create' => [
            'nome' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required']
        ],

        'update' => [
           'nome' => ['required'],
           'email' => ['required', 'email'],
           'phone' => ['required']
        ]

    ];
    
}
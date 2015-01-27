<?php

namespace Validators;

class ReciboValidator extends BaseValidator
{
	/**
     * Regras de Validaçao para o Validator.
     *
     * @var array
     */
    protected $rules = [

        'create' => [
            'cliente' => ['required'],
            'convenio' => ['required'],
            'pagamento' => ['required'],
            'corrego' => ['required'],
            'cidade' => ['required'],
            'status' => ['required'],
            'analise' => ['required']
        ],

        'update' => [
            'cliente' => ['required'],
            'convenio' => ['required'],
            'pagamento' => ['required'],            
            'corrego' => ['required'],
            'cidade' => ['required'],
            'status' => ['required'],
            'analise' => ['required']
        ]

    ];

    
}
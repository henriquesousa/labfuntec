<?php

interface ReciboRepositoryInterface {

    public function getReciboAll();

    public function postRecibo($inputs);

    public function reciboOrderBy($campo, $tipo, $results);

    public function getReciboClienteName(Cliente $cliente);

    public function getReciboDataMes(Recibo $mes);

    public function getReciboClienteAndData(Cliente $cliente, Recibo $mes);

    public function reciboAttach($obj, $relacionamento, $valor, $campo, $i);

    public function getReciboFoF($id);
}
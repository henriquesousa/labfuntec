<?php
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 28/03/15
 * Time: 08:53
 */

class ReciboRepositoryInterface {

    public function getReciboAll();

    public function getReciboClienteName($cliente);

    public function getReciboDataMes($mes);

    public function getReciboClienteAndData($cliente, $mes);

}
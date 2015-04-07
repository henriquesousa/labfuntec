<?php
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 28/03/15
 * Time: 16:56
 */

interface EnderecoRepositoryInterface {

    public function allEndereco();

    public function postEndereco($recibo, $inputs, $i);

    public function deleteEnderecoByRecibo($id);

}
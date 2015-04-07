<?php
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 28/03/15
 * Time: 16:57
 */

class EnderecoRepository implements EnderecoRepositoryInterface {

    public function allEndereco()
    {
        return Endereco::all();
    }

    public function postEndereco($recibo, $inputs, $i)
    {
        $endereco = new Endereco();
        $endereco->recibo_id = $recibo->id;
        $endereco->cidade = $inputs['cidade'.$i.''];
        $endereco->corrego = $inputs['corrego'.$i.''];
        $endereco->save();
    }

    public function deleteEnderecoByRecibo($id)
    {
        DB::table('enderecos')->where('recibo_id', $id)->delete();
    }
}
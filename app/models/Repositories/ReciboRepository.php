<?php
/**
 * Created by PhpStorm.
 * User: henrique
 * Date: 28/03/15
 * Time: 08:57
 */

class ReciboRepository implements ReciboRepositoryInterface
{
    public function getReciboAll(){

    }
    
    public function getReciboClienteName($cliente)
    {
        $recibos = DB::table('recibos')
            ->join('analise_recibo', 'recibos.id', '=', 'analise_recibo.recibo_id')
            ->join('analises', 'analises.id', '=', 'analise_recibo.analise_id')
            ->join('clientes', 'recibos.cliente_id', '=', 'clientes.id')
            ->join('convenios', 'recibos.convenio_id', '=', 'convenios.id')
            ->where('clientes.nome', 'like', '%'.$nome.'%')
            ->whereRaw('MONTH(recibos.created_at) = ?', [$mes])
            ->selectRaw('recibos.id, recibos.pagamento, clientes.nome as cli_nome, convenios.nome as conv_nome, analise_recibo.*, analises.*')
            ->get();

        return $recibos;
    }

    public function getReciboDataMes($mes)
    {

    }

    public function getReciboClienteAndData($cliente, $mes)
    {

    }

}
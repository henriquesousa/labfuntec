<?php

class ReciboRepository implements ReciboRepositoryInterface
{
    public function getReciboAll()
    {
        return Recibo::all();
    }

    public function postRecibo($inputs)
    {
        $saida = new DateTime();

        $recibo = new Recibo();
        $recibo->labref = Input::get("labref");
        $recibo->saida = $saida->add(new DateInterval( "P10D" ));
        $recibo->cliente_id = Input::get("cliente");
        $recibo->funcionario_id = Auth::user()->id;
        $recibo->convenio_id = Input::get("convenio");
        $recibo->pagamento = Input::get("pagamento");
        $recibo->status = Input::get("status");
        $recibo->save();

        return $recibo;
    }

    public function reciboOrderBy($campo, $tipo, $results)
    {
        return Recibo::orderBy($campo, $tipo)->paginate($results);
    }
    
    public function getReciboClienteName(Cliente $cliente)
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

    public function getReciboDataMes(Recibo $mes)
    {

    }

    public function getReciboClienteAndData(Cliente $cliente, Recibo $mes)
    {

    }

    public function reciboAttach($obj, $relacionamento, $valor, $campo, $i)
    {
        $obj->$relacionamento()->attach($valor[$i], [$campo => $i]);
    }

    public function getReciboFoF($id)
    {
        return Recibo::findOrFail($id);
    }
}
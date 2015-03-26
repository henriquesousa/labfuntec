<?php

use \Pdf\RelatorioPdf as Rpdf;
use Pdf\Cliente as Cli;
use Pdf\Convenio as Conv;

class RelatoriosController extends BaseController
{

    public function  getIndex()
    {
        $convenio_options = array('' => 'Selecione Convenio') + Convenio::lists('nome', 'nome');
        return View::make('relatorios.index')->with('convenio_options', $convenio_options);
    }

    /**
     * @return consulta relatorio index
     */
    public  function postConsultaCliente()
    {
        //dd(Input::all());
        $mes = Input::get('mes');
        $nome = Input::get('nome');

        if($nome != '' and $mes != 0) {
            $recibos = DB::table('recibos')
                ->join('analise_recibo', 'recibos.id', '=', 'analise_recibo.recibo_id')
                ->join('analises', 'analises.id', '=', 'analise_recibo.analise_id')
                ->join('clientes', 'recibos.cliente_id', '=', 'clientes.id')
                ->join('convenios', 'recibos.convenio_id', '=', 'convenios.id')
                ->where('clientes.nome', 'like', '%'.$nome.'%')
                ->whereRaw('MONTH(recibos.created_at) = ?', [$mes])
                ->selectRaw('recibos.id, recibos.pagamento, clientes.nome as cli_nome, convenios.nome as conv_nome, analise_recibo.*, analises.*')
                ->get();

            if(count($recibos) != 0)
            {
                return $this->getRelatorioCliente($recibos);
            }
            return $this->getIndex();

        }
        if($nome!= '' and $mes == 0) {
            $recibos = DB::table('recibos')
                ->join('analise_recibo', 'recibos.id', '=', 'analise_recibo.recibo_id')
                ->join('analises', 'analises.id', '=', 'analise_recibo.analise_id')
                ->join('clientes', 'recibos.cliente_id', '=', 'clientes.id')
                ->join('convenios', 'recibos.convenio_id', '=', 'convenios.id')
                ->where('clientes.nome', 'like', '%'.$nome.'%')
                ->selectRaw('recibos.id, recibos.pagamento, clientes.nome as cli_nome, convenios.nome as conv_nome, analise_recibo.*, analises.*')
                ->get();

            if(count($recibos) != 0)
            {
                return $this->getRelatorioCliente($recibos);
            }
            return $this->getIndex();

        }
        if($mes != 0 and $nome == '') {
            $recibos = DB::table('recibos')
                ->join('analise_recibo', 'recibos.id', '=', 'analise_recibo.recibo_id')
                ->join('analises', 'analises.id', '=', 'analise_recibo.analise_id')
                ->join('clientes', 'recibos.cliente_id', '=', 'clientes.id')
                ->join('convenios', 'recibos.convenio_id', '=', 'convenios.id')
                ->whereRaw('MONTH(recibos.created_at) = ?', [$mes])
                ->selectRaw('recibos.id, recibos.pagamento, clientes.nome as cli_nome, convenios.nome as conv_nome, analise_recibo.*, analises.*')
                ->get();

            if(count($recibos) != 0)
            {
                return $this->getRelatorioCliente($recibos);
            }
            return $this->getIndex();

        }
        if($mes == 0 and $nome == '') {
            return $this->getAllRelatoriosCliente();
        }

    }

    /**
     * @return Recibos por $mes
     */
    public function postConsultaConvenio()
    {
        $mes = Input::get('mes');
        $nome = Input::get('convenio');

        if($nome != '' and $mes != 0) {
            $recibos = DB::table('recibos')
                ->join('analise_recibo', 'recibos.id', '=', 'analise_recibo.recibo_id')
                ->join('analises', 'analises.id', '=', 'analise_recibo.analise_id')
                ->join('clientes', 'recibos.cliente_id', '=', 'clientes.id')
                ->join('convenios', 'recibos.convenio_id', '=', 'convenios.id')
                ->where('convenios.nome', 'like', '%'.$nome.'%')
                ->whereRaw('MONTH(recibos.created_at) = ?', [$mes])
                ->selectRaw('recibos.id, recibos.pagamento, clientes.nome as cli_nome, convenios.nome as conv_nome, analise_recibo.*, analises.*')
                ->get();

            if(count($recibos) != 0)
            {
                return $this->getRelatorioConvenio($recibos);
            }
            return $this->getIndex();

        }
        if($nome!= '' and $mes == 0) {
            $recibos = DB::table('recibos')
                ->join('analise_recibo', 'recibos.id', '=', 'analise_recibo.recibo_id')
                ->join('analises', 'analises.id', '=', 'analise_recibo.analise_id')
                ->join('clientes', 'recibos.cliente_id', '=', 'clientes.id')
                ->join('convenios', 'recibos.convenio_id', '=', 'convenios.id')
                ->where('convenios.nome', 'like', ''.$nome.'')
                ->selectRaw('recibos.id, recibos.pagamento, clientes.nome as cli_nome, convenios.nome as conv_nome, analise_recibo.*, analises.*')
                ->get();

            if(count($recibos) != 0)
            {
                return $this->getRelatorioConvenio($recibos);
            }
            return $this->getIndex();

        }
        if($mes != 0 and $nome == '') {
            $recibos = DB::table('recibos')
                ->join('analise_recibo', 'recibos.id', '=', 'analise_recibo.recibo_id')
                ->join('analises', 'analises.id', '=', 'analise_recibo.analise_id')
                ->join('clientes', 'recibos.cliente_id', '=', 'clientes.id')
                ->join('convenios', 'recibos.convenio_id', '=', 'convenios.id')
                ->whereRaw('MONTH(recibos.created_at) = ?', [$mes])
                ->selectRaw('recibos.id, recibos.pagamento, clientes.nome as cli_nome, convenios.nome as conv_nome, analise_recibo.*, analises.*')
                ->get();

            if(count($recibos) != 0)
            {
                return $this->getRelatorioConvenio($recibos);
            }
            return $this->getIndex();

        }
        if($mes == 0 and $nome == '')
        {
            $recibos = \Recibo::all();
            $analiseV = \Analise::all();
            return Cli::getRelatorioAllClientes($recibos, $analiseV);
        }
    }

    public function postConsultaSaidas()
    {
        $mes = Input::get('mes');
        $saida = Input::get('saida');
        if($nome != '' and $mes != 0) {
            $saidas = Saida::where('descricao', 'like', '%' . Input::get('saida') . '%')
                ->whereRaw('MONTH(recibos.created_at) = ?', [$mes])->get();
            return "mes e nome";
        }
        if($saida != '' and $mes == 0) {
            $saidas = Saida::where('nome', 'like', '%' . Input::get('nome') . '%')->get();
            return "nome";
        }
        if($mes != 0 and $saida == '') {
            $recibos = Saida::whereRaw('MONTH(recibos.created_at) = ?', [$mes])->get();
            return "mes";
        }
        if($mes == 0 and $saida == '') {
            $recibos = Recibo::all()
                ->orderBy('created_at', 'desc')->get();
            return "todos";
        }
    }

    public function postIndex()
    {
        return "teste index post";
    }

    public function getRelatorioConvenio($recibos)
    {
        return Conv::getIsRelatorioConvenio($recibos);
    }


    public function getRelatorioCliente($recibos)
    {
        return Cli::getIsRelatorioCliente($recibos);
    }

    public function getAllRelatoriosCliente()
    {
        $recibos = \Recibo::all();
        $analiseV = \Analise::all();

        return Cli::getRelatorioAllClientes($recibos, $analiseV);
    }

}
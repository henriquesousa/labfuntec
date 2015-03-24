<?php
/*
 if($nome != '' and $mes != 0) {
            $recibos = Recibo::with('convenio', 'funcionario', 'analise')
                                ->whereHas('cliente', function ($q) {
                                    $q->where('nome', 'like', '%' . Input::get('nome') . '%');

                                })->whereRaw('MONTH(recibos.created_at) = ?', [$mes])
                                  ->get();

dd($recibos);

            if(count($recibos) != 0)
            {
                return $this->getRelatorioCliente($recibos);
            }
            return $this->getIndex();

        }
        if($nome!= '' and $mes == 0) {
            $recibos = Recibo::with('convenio', 'funcionario', 'analise')
                ->whereHas('cliente', function ($q) {
                    $q->where('nome', 'like', '%' . Input::get('nome') . '%');
                })->get();

            //dd($recibos);

            if(count($recibos) != 0)
            {
                return $this->getRelatorioCliente($recibos);
            }
            return $this->getIndex();

        }
        if($mes != 0 and $nome == '') {
            $recibos = Recibo::with('convenio', 'funcionario', 'analise', 'cliente')
                ->whereRaw('MONTH(recibos.created_at) = ?', [$mes])->get();

        }
        if($mes == 0 and $nome == '') {
            $recibos = Recibo::with('convenio', 'funcionario', 'analise', 'cliente')
                ->orderBy('created_at', 'desc')->get();

            return $this->getAllRelatoriosCliente();

        }
*/
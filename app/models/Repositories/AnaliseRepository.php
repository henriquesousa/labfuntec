<?php

class AnaliseRepository implements AnaliseRepositoryInterface {

    public function getAnaliseAll()
    {
        return Analise::all();
    }

    public function deleteAnaliseReciboByRecibo($id)
    {
        DB::table('analise_recibo')->where('recibo_id', $id)->delete();
    }
}
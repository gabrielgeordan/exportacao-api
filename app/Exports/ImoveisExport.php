<?php

namespace App\Exports;

use App\Models\Imoveis;
use Illuminate\Support\Facades\DB;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ImoveisExport
{
    public function export()
    {
        // Desabilitar o registro de consultas
        DB::connection()->disableQueryLog();

        //$imoveis = Imoveis::all();

        $writer = SimpleExcelWriter::create(storage_path('app/imoveis.csv'));

        $writer->addHeader([
            'imovel',
            'codigo',
            'nome_propriedade',
            'data_cadastro',
            'municipio',
            'uf',
            'status_imovel',
            'latitude',
            'longitude',
            'tipo_imovel',
            'mf',
            'grupo',
            'cpf_cnpj_proprietario',
            'proprietario',
        ]);

    Imoveis::query()->chunk(1000, function ($imoveis) use ($writer) {
        foreach ($imoveis as $imovel) {
            $writer->addRow([
                $imovel->imovel,
                $imovel->codigo,
                $imovel->nome_propriedade,
                $imovel->data_cadastro,
                $imovel->municipio,
                $imovel->uf,
                $imovel->status_imovel,
                $imovel->latitude,
                $imovel->longitude,
                $imovel->tipo_imovel,
                $imovel->mf,
                $imovel->grupo,
                $imovel->cpf_cnpj_proprietario,
                $imovel->proprietario,
            ]);
        }
    });
        $writer->close();
    }

}

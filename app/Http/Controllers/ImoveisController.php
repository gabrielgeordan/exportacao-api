<?php

namespace App\Http\Controllers;

use App\Models\Imoveis;
use App\Exports\ImoveisExport;
use Illuminate\Http\Request;

class ImoveisController extends Controller
{
    public function export()
    {

    }

    public function index(int $pagination = 20)
    {
        return Imoveis::paginate($pagination);
    }

    public function exportar()
    {
        $export = new ImoveisExport();
        $export->export();

        return response()->download(storage_path('app/imoveis.csv'))->deleteFileAfterSend(true);
    }
}

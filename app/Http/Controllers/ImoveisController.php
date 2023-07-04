<?php

namespace App\Http\Controllers;

use App\Models\Imoveis;
use App\Exports\ImoveisExport;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class ImoveisController extends Controller
{
    public function export()
    {

    }

    public function index(int $pagination = 20)
    {
        $data = Imoveis::paginate($pagination);
        return response($data, 200);
    }

    public function exportar()
    {
        $export = new ImoveisExport();
        $export->export();

        return response()->download(storage_path('app/imoveis.csv'))->deleteFileAfterSend(true);
    }
}

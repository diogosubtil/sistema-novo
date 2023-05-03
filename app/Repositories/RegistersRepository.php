<?php

namespace App\Repositories;

use App\Models\Register;
use Illuminate\Http\Request;

interface RegistersRepository
{
    //INDEX
    public function index(Request $request): array;

    //ADICIONA
    public function add($id_model, $action, $model, $dataNew = null, $dataOld = null): Register;
}

<?php

namespace App\Repositories;

use App\Models\Register;

interface RegistersRepository
{
    //ADICIONA USUARIO
    public function add($id_model, $action, $model, $dataNew = null, $dataOld = null): Register;
}

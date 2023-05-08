<?php

namespace App\Repositories;


use App\Models\LogClient;
use Illuminate\Http\Request;

interface LogsClientsRepository
{
    //ADICIONA
    public function add(Request $request): LogClient;

    //MIGRAR
    public function migration();
}

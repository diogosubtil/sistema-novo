<?php

namespace App\Repositories;

use App\Http\Requests\SupportsAnswersFormRequest;
use App\Models\SupportAnswer;
use Illuminate\Http\Request;

interface SupportsAnswersRepository
{
    //ADICIONA A RESPOSTA DO SUPORTE
    public function add(SupportsAnswersFormRequest $request): SupportAnswer;
}

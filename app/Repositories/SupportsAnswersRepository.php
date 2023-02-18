<?php

namespace App\Repositories;

use App\Models\SupportAnswer;
use Illuminate\Http\Request;

interface SupportsAnswersRepository
{
    //ADICIONA USUARIO
    public function add(Request $request): SupportAnswer;
}

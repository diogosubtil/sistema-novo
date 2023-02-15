<?php

namespace App\Http\Controllers;

use App\Repositories\SupportsAnswersRepository;
use Illuminate\Http\Request;

class SupportsAnswersController extends Controller
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private SupportsAnswersRepository $repository)
    {
    }
}

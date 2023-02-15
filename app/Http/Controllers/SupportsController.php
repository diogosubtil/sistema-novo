<?php

namespace App\Http\Controllers;

use App\Repositories\SupportsRepository;
use Illuminate\Http\Request;

class SupportsController extends Controller
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private SupportsRepository $repository)
    {
    }
}

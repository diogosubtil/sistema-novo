<?php

namespace App\Repositories;

use App\Models\Upload;
use Illuminate\Http\Request;

interface UploadsRepository
{
    //ADICIONA UPLOADS
    public function add($type, $type_id, $files): Upload;
}

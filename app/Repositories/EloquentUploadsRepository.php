<?php

namespace App\Repositories;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EloquentUploadsRepository implements UploadsRepository
{
    //FUNÇÂO PARA CADASTRAR NO BANCO
    public function add($type, $type_id, $files): Upload
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();
        foreach ($files as $file){
            //MOVE O ARQUIVO PARA O LOCAL
            $path = '/files/uploads/supports/';
            $name = $file->hashName();
            $file->move(public_path('files/uploads/supports'), $name);

            //OBTEM OS DADOS E FAZ O CADASTRO
            $data['type'] = $type;
            $data['type_id'] = $type_id;
            $data['url'] = $path . $name;
            $data['name'] = $name;
            $data['user'] = Auth::user()->id;
            $upload = Upload::create($data);
        }

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        return $upload;
    }
}

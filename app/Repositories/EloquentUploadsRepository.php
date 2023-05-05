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
    public function add($type, $type_id, $files, $name_file): Upload
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        foreach ($files as $key => $file){
            //MOVE O ARQUIVO PARA O LOCAL
            $path = '/files/uploads/' . $type_id . '/';
            $extension = $file->extension();
            $file->move(public_path('files/uploads/' . $type_id), $name_file . '-' . $key . '.' . $extension);

            //OBTEM OS DADOS E FAZ O CADASTRO
            $data['type'] = $type;
            $data['type_id'] = $type_id;
            $data['url'] = $path . $name_file . '-' . $key . '.' . $extension;
            $data['name'] = $name_file . '-' . $key . '.' . $extension;
            $data['extension'] = $extension;
            $data['user'] = Auth::user()->id;
            $upload = Upload::create($data);
        }

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        return $upload;
    }
}

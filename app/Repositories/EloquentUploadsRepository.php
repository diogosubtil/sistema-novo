<?php

namespace App\Repositories;

use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class EloquentUploadsRepository implements UploadsRepository
{
    //FUNÇÂO PARA CADASTRAR NO BANCO
    public function add($type, $type_id, $files, $name_file): Upload
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        foreach ($files as $key => $file){
            count($files) == 1? $number = '' : $number = '-' . $key;
            //MOVE O ARQUIVO PARA O LOCAL
            $path = '/files/uploads/' . $type_id . '/';
            $extension = $file->extension();
            $file->move(public_path('files/uploads/' . $type_id), $name_file . $number . '.' . $extension);

            //OBTEM OS DADOS E FAZ O CADASTRO
            $data['type'] = $type;
            $data['type_id'] = $type_id;
            $data['url'] = $path . $name_file . $number . '.' . $extension;
            $data['name'] = $name_file . $number;
            $data['extension'] = $extension;
            $data['user'] = Auth::user()->id;
            $upload = Upload::create($data);
        }

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

        return $upload;
    }

    //FUNÇÃO PARA EXCLUIR USUARIO
    public function delete(Upload $upload)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        $upload->delete();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();
    }

    //FUNÇÃO PARA MIGRAR
    public function migration()
    {
        //FUNÇÃO PARA PODER SETAR O ID
        Upload::unguard();

        //OBTEM OS DADOS
        $api = Http::get('https://unidade.espacoicelaser.com/migracao/clientes-uploads');

        $total = count($api->json());
        $att = 0;
        $add = 0;

        //ADD OS DADOS
        foreach ($api->json() as $upload) {

            //OBTEM PARA VERIFICAÇÃO
            $get = Upload::where('id', $upload['id'])->withTrashed()->first();
            $getExtension = explode('.', $upload['url']);

            if ($get) {


                $get->type = $upload['tipo'];
                $get->type_id = $upload['tipo'] == 4 ? $upload['venda'] : $upload['cliente'];
                $get->url = $upload['url'];
                $get->name = $upload['nome'];
                $get->extension = $getExtension[1];
                $get->user = $upload['usuario'];
                $get->created_at = $upload['dataCadastro'];
                $get->deleted_at = $upload['ativo'] == 'n' ? date('Y-m-d H:i:s') : null;
                $get->save();

                $att++;

            } else {

                Upload::create([
                    'id' => $upload['id'],
                    'type' => $upload['tipo'],
                    'type_id' => $upload['tipo'] == 4 ? $upload['venda'] : $upload['cliente'],
                    'url' => $upload['url'],
                    'name' => $upload['nome'],
                    'extension' => $getExtension[1],
                    'user' => $upload['usuario'],
                    'created_at' => $upload['dataCadastro'],
                    'deleted_at' => $upload['ativo'] == 'n' ? date('Y-m-d H:i:s') : null
                ]);

                $add++;

            }

        }

        echo 'Total: ' . $total . '<br>';
        echo 'Atualizados: ' . $att . '<br>';
        echo 'Cadastrados: ' . $add . '<br>';

    }
}

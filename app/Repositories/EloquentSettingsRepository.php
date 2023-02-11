<?php

namespace App\Repositories;

use App\Http\Requests\SettingsFormRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Image;

class EloquentSettingsRepository implements SettingsRepository
{
    //FUNÇÃO PARA UPDATE NO BANCO
    public function edit(SettingsFormRequest $request, Setting $setting)
    {
        //INICIA A TRANSAÇÃO
        DB::beginTransaction();

        //OBTEM OS DADOS DO REQUEST E FAZ O UPDATE
        $data = $request->except('_token');
        $directory = '/files/assets/images/';
        $data['logo'] = $setting->logo;
        $data['favicon'] = $setting->favicon;

        //VERIFICA SE EXISTE UPLOAD DA LOGO
        if ($request->logo){
            $logoName = 'l'.time().'.'.$request->logo->extension();
            $request->logo->move(public_path('files/assets/images'), $logoName);
            $data['logo'] = $directory . $logoName;

        }

        //VERIFICA SE EXISTE UPLOAD DO FAVICON
        if ($request->favicon){
            $faviconName = 'f'.time().'.'.$request->favicon->extension();
            $request->favicon->move(public_path('files/assets/images'), $faviconName);
            $data['favicon'] = $directory . $faviconName;
        }

        //SALVA NO BANCO DE DADOS
        $setting->fill($data);
        $setting->save();

        //ENVIA A TRASAÇÃO (COMMIT)
        DB::commit();

    }
}

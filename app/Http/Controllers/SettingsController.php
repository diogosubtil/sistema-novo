<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsFormRequest;
use App\Models\Setting;
use App\Repositories\SettingsRepository;
use RealRashid\SweetAlert\Facades\Alert;

class SettingsController extends Controller
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private SettingsRepository $repository)
    {
    }

    //FUNÇÃO PARA EXIBIR A VIEW (EDITAR)
    public function edit(Setting $setting)
    {
        //RETORNA A VIEW COM OS DADOS
        return view('settings.edit')
            ->with('setting', $setting);
    }

    //FUNÇÃO PARA FAZER UPDATE NO USUARIO
    public function update(SettingsFormRequest $request, Setting $setting)
    {
        //EDITA NO BANCO VIA REPOSITORY
        $this->repository->edit($request, $setting);

        //ALERT
        Alert::success('Concluido', 'Configuração editada com sucesso!');

        //RETORNA A VIEW
        return to_route('settings.edit', $setting->id);
    }
}

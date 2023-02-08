<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnidadesFormRequest;
use App\Models\Unidade;
use App\Models\User;
use App\Repositories\UnidadesRepository;
use RealRashid\SweetAlert\Facades\Alert;

class UnidadesController extends Controller
{
    //CONSTRUTOR COM REPOSITORY INJETADO
    public function __construct(private UnidadesRepository $repository)
    {
    }

    //FUNÇÃO PARA EXIBIR A VIEW (PAINEL)
    public function index()
    {
        //OBTEM AS UNIDADE
        $unidades = Unidade::query()->paginate(15);

        //OBTEM ATIVOS,DESATIVADOS,ONLINE
        $ativos = 0;
        $desativados = 0;
        foreach ($unidades as $unidade){
            if ($unidade->ativo == 's'){
                $ativos++;
            }
            if ($unidade->ativo == 'n'){
                $desativados++;
            }
        }

        //RETORNA A VIEW COM OS DADOS
        return view('unidades.index')
            ->with('unidades', $unidades)
            ->with('ativos', $ativos)
            ->with('desativados', $desativados);
    }

    //FUNÇÃO PARA EXIBIR A VIEW (CADASTRAR)
    public function create()
    {
        //TIMEZONES BRASIL
        $timezones = array(
            'AC' => 'America/Rio_branco',   'AL' => 'America/Maceio',
            'AP' => 'America/Belem',        'AM' => 'America/Manaus',
            'BA' => 'America/Bahia',        'CE' => 'America/Fortaleza',
            'DF' => 'America/Sao_Paulo',    'ES' => 'America/Sao_Paulo',
            'GO' => 'America/Sao_Paulo',    'MA' => 'America/Fortaleza',
            'MT' => 'America/Cuiaba',       'MS' => 'America/Campo_Grande',
            'MG' => 'America/Sao_Paulo',    'PR' => 'America/Sao_Paulo',
            'PB' => 'America/Fortaleza',    'PA' => 'America/Belem',
            'PE' => 'America/Recife',       'PI' => 'America/Fortaleza',
            'RJ' => 'America/Sao_Paulo',    'RN' => 'America/Fortaleza',
            'RS' => 'America/Sao_Paulo',    'RO' => 'America/Porto_Velho',
            'RR' => 'America/Boa_Vista',    'SC' => 'America/Sao_Paulo',
            'SE' => 'America/Maceio',       'SP' => 'America/Sao_Paulo',
            'TO' => 'America/Araguaia',
        );

        //OBTEM OS USUARIOS
        $usuarios = User::query()->where('ativo', '=', 's')->get();

        //RETORNA A VIEW
        return view('unidades.create')
            ->with('timezones', $timezones)
            ->with('usuarios', $usuarios);
    }

    //FUNÇÃO PARA CADASTRAR NO BANCO
    public function store(UnidadesFormRequest $request)
    {
        //ADICIONA NO BANCO VIA REPOSITORY
        $this->repository->add($request);

        //ALERT
        Alert::success('Concluido', 'Unidade cadastrada com sucesso!');

        //RETORNA A VIEW
        return to_route('unidades.index');
    }

    //FUNÇÃO PARA EXIBIR A VIEW (EDITAR)
    public function edit(Unidade $unidade)
    {
        //TIMEZONES BRASIL
        $timezones = array(
            'AC' => 'America/Rio_branco',   'AL' => 'America/Maceio',
            'AP' => 'America/Belem',        'AM' => 'America/Manaus',
            'BA' => 'America/Bahia',        'CE' => 'America/Fortaleza',
            'DF' => 'America/Sao_Paulo',    'ES' => 'America/Sao_Paulo',
            'GO' => 'America/Sao_Paulo',    'MA' => 'America/Fortaleza',
            'MT' => 'America/Cuiaba',       'MS' => 'America/Campo_Grande',
            'MG' => 'America/Sao_Paulo',    'PR' => 'America/Sao_Paulo',
            'PB' => 'America/Fortaleza',    'PA' => 'America/Belem',
            'PE' => 'America/Recife',       'PI' => 'America/Fortaleza',
            'RJ' => 'America/Sao_Paulo',    'RN' => 'America/Fortaleza',
            'RS' => 'America/Sao_Paulo',    'RO' => 'America/Porto_Velho',
            'RR' => 'America/Boa_Vista',    'SC' => 'America/Sao_Paulo',
            'SE' => 'America/Maceio',       'SP' => 'America/Sao_Paulo',
            'TO' => 'America/Araguaia',
        );

        //OBTEM OS USUARIOS
        $usuarios = User::query()->where('ativo', '=', 's')->get();

        //RETORNA A VIEW COM OS DADOS
        return view('unidades.edit')
            ->with('unidade', $unidade)
            ->with('timezones', $timezones)
            ->with('usuarios', $usuarios);
    }

    //FUNÇÃO PARA FAZER UPDATE NO USUARIO
    public function update(UnidadesFormRequest $request, Unidade $unidade)
    {
        //EDITA NO BANCO VIA REPOSITORY
        $this->repository->edit($request, $unidade);

        //ALERT
        Alert::success('Concluido', 'Unidade editada com sucesso!');

        //RETORNA A VIEW
        return to_route('unidades.index');
    }

    //FUNÇÃO PARA DESATIVAR USUARIO
    public function disable(Unidade $unidade)
    {
        //DESABILITA USUARIO VIA REPOSITORY
        $this->repository->disable($unidade);

        //ALERT
        Alert::success('Concluido', 'Unidade desativada com sucesso!');

        //RETORNA A VIEW
        return to_route('unidades.index');
    }

    //FUNÇÃO PARA ATIVAR USUARIO
    public function enable(Unidade $unidade)
    {
        //ATIVA USUARIO VIA REPOSITORY
        $this->repository->enable($unidade);

        //ALERT
        Alert::success('Concluido', 'Unidade ativada com sucesso!');

        //RETORNA A VIEW
        return to_route('unidades.index');
    }
}

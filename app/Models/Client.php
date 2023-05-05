<?php

namespace App\Models;

use App\ModelFilters\ClientsFilter;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, ClientsFilter, Filterable, SoftDeletes;

    //TABELA QUE A MODEL FAZ REFERENCIA NO BANCO DE DADOS
    protected $table = 'clients';

    protected $fillable = [
        'nome',
        'sexo',
        'estado_civil',
        'dataNascimento',
        'cpf',
        'rg',
        'endereco',
        'cep',
        'bairro',
        'cidade',
        'numero',
        'whatsapp',
        'email',
        'senha',
        'unidade_id',
        'transferido',
        'diabetes',
        'cardiaco',
        'hormonal',
        'foliculite',
        'foliculite_onde',
        'doenca_de_pele',
        'doenca_de_pele_qual',
        'fotossensiveis',
        'fotossensiveis_qual',
        'queloides',
        'queloides_qual',
        'alergico',
        'alergico_qual',
        'herpes',
        'herpes_frequencias',
        'epilepsia',
        'epilepsia_frequencias',
        'neoplasias_metastases',
        'neopla_metast_qual',
        'medicamentos',
        'medicamentos_qual',
        'doenca_autoimune',
        'doenca_autoimune_qual',
        'gestante',
        'gestante_meses',
        'lactante',
        'lactante_tempo',
        'tratamento',
        'tratamento_qual',
        'pelos_brancos_loiros_ruivos',
        'exposicao_sol',
        'exposicao_sol_frequencia',
        'filtro_solar',
        'roacutan',
        'roacutan_qual',
        'medic_fotossensiveis',
        'medic_fotossensiveis_qual',
        'anabolizante',
        'anabolizante_qual',
        'acidos',
        'acidos_tempo',
        'laser',
        'laser_qual',
        'tatuagem_micropig',
        'tatuagem_micropig_onde',
        'reacoes',
        'reacoes_qual',
        'ativo',
    ];

    //SOFTDELETES
    protected $dates = ['deleted_at'];

    //Filter Eloquent
    private static array $whiteListFilter = ['*'];

    //FUNÇAO DE RELACIONAMENTOS
    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }
}

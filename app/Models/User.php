<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\ModelFilters\UsersFilter;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Panoscape\History\HasHistories;
use Panoscape\History\HasOperations;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UsersFilter, Filterable, SoftDeletes, HasOperations, HasHistories;

    protected $fillable = [
        'name',
        'email',
        'password',
        'funcao',
        'telefone',
        'unidade_id',
        'treinamento',
    ];

    //SOFTDELETES
    protected $dates = ['deleted_at'];

    //Filter Eloquent
    private static array $whiteListFilter = ['*'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //FUNÇAO DE RELACIONAMENTOS
    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    //FUNÇÃO HISTORICO
    public function getModelLabel()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder){
            $queryBuilder->orderBy('name', 'asc');
        });
        return $this->display_name;
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\ModelFilters\UsersFilter;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Panoscape\History\HasHistories;
use Panoscape\History\HasOperations;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UsersFilter, Filterable, HasOperations, HasHistories;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'funcao',
        'telefone',
        'unidade',
        'treinamento',
    ];

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

    //FUNÇÃO HISTORICO
    public function getModelLabel()
    {
        return $this->display_name;
    }
}

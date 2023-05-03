<?php

namespace App\ModelFilters;

use Illuminate\Database\Eloquent\Builder;

trait ClientsFilter
{
    /**
     * This is a sample custom query
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param                                       $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function nome(Builder $builder, $value)
    {
        return $builder->where('nome', 'like', '%'.$value.'%');
    }

}

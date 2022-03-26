<?php

namespace App\Http\Repository;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Builder;

class RegistroEvolutivoRepository extends Repository
{
    private function applyFilters(Builder $query, array $filters = null)
    {
        if (!$query) {
            $query = $this->query();
        }

        if ($filters === null) {
            return $query;
        }

        $this->filter($filters, "aluno", function ($value) use ($query) {
            $query->where("alu_id", "=", $value);
        });

        return $query;
    }

    public function listItems(array $filters = null, $perPage = 20)
    {
        $query = $this->applyFilters($this->query(), $filters)
            ->selectRaw('regev_id as id, arq_id as arquivo, regev_descricao as descricao, DATE(regev_datahora) as datahora')
            ->orderBy("regev_datahora", "desc");
        if($perPage == -1){
            $perPage = $query->count();
        }
        return $query->paginate($perPage);
    }
}
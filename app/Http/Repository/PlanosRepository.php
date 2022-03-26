<?php

namespace App\Http\Repository;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Builder;

class PlanosRepository extends Repository
{
    private function applyFilters(Builder $query, array $filters = null)
    {
        if (!$query) {
            $query = $this->query();
        }

        if ($filters === null) {
            return $query;
        }

        $this->filter($filters, "plan_ativo", function ($value) use ($query) {
            $query->where("plan_ativo", "=", $value);
        });

        return $query;
    }

    public function listItems(array $filters = null, $perPage = 20)
    {
        $query = $this->applyFilters($this->query(), $filters)
            ->selectRaw('plan_id as id, plan_titulo as titulo, plan_resumo as resumo, plan_descricao as descricao, plan_valor as valor, tbl_planos.arq_id as arquivo, tbl_arquivo.arq_pasta as arquivo_pasta, tbl_arquivo.arq_extensao as arquivo_extensao')
            ->join('tbl_arquivo', 'tbl_arquivo.arq_id', '=', 'tbl_planos.arq_id');
        if($perPage == -1){
            $perPage = $query->count();
        }
        return $query->paginate($perPage);
    }
}
<?php

namespace App\Http\Repository;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Builder;

class ParceirosRepository extends Repository
{
    private function applyFilters(Builder $query, array $filters = null)
    {
        if (!$query) {
            $query = $this->query();
        }

        if ($filters === null) {
            return $query;
        }

        /*$this->filter($filters, "", function ($value) use ($query) {
            $query->where("", "=", $value);
        });*/

        return $query;
    }

    public function listItems(array $filters = null, $perPage = 20)
    {
        $query = $this->applyFilters($this->query(), $filters)
            ->join('tbl_arquivo', 'tbl_arquivo.arq_id', '=', 'tbl_parceiros.arq_id')
            ->selectRaw('parc_id as id, parc_nome as nome, parc_descricao as descricao, parc_link as link, tbl_parceiros.arq_id as arquivo, tbl_arquivo.arq_pasta as arquivo_pasta, tbl_arquivo.arq_extensao as arquivo_extensao');
        if($perPage == -1){
            $perPage = $query->count();
        }
        return $query->paginate($perPage);
    }
}
<?php

namespace App\Http\Repository;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Builder;

class BlogRepository extends Repository
{
    private function applyFilters(Builder $query, array $filters = null)
    {
        if (!$query) {
            $query = $this->query();
        }

        if ($filters === null) {
            return $query;
        }

        $this->filter($filters, "blog_ativo", function ($value) use ($query) {
            $query->where("blog_ativo", "=", $value);
        });

        return $query;
    }

    public function listItems(array $filters = null, $perPage = 20)
    {
        $query = $this->applyFilters($this->query(), $filters)
         ->join('tbl_arquivo', 'tbl_arquivo.arq_id', '=', 'tbl_blog.arq_id')
            ->selectRaw('blog_id as id, blog_titulo as titulo, blog_resumo as resumo, DATE(blog_datahora) as data, tbl_blog.arq_id as arquivo, tbl_arquivo.arq_pasta as arquivo_pasta, tbl_arquivo.arq_extensao as arquivo_extensao')
            ->with(['parceiro' => function($query){
                $query->selectRaw('parc_id as id, parc_nome as nome, arq_id as arquivo');
            }]);
        if($perPage == -1){
            $perPage = $query->count();
        }
        return $query->paginate($perPage);
    }
}
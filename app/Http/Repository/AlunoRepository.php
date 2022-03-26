<?php

namespace App\Http\Repository;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Builder;

class AlunoRepository extends Repository
{
    private function applyFilters(Builder $query, array $filters = null)
    {
        if (!$query) {
            $query = $this->query();
        }

        if ($filters === null) {
            return $query;
        }

        $this->filter($filters, "professor", function ($value) use ($query) {
            $query->where("prof_id", "=", $value);
        });

        return $query;
    }

    public function listItems(array $filters = null, $perPage = 20)
    {
        $query = $this->applyFilters($this->query(), $filters)
            ->selectRaw('alu_id as id, alu_nome as nome, alu_whatsapp as whatsapp');
        if($perPage == -1){
            $perPage = $query->count();
        }
        return $query->paginate($perPage);
    }

    public function perfil($id)
    {
        return $this->query()
            ->selectRaw('
                alu_id as id,
                alu_nome as nome,
                alu_dtnascimento as dtnascimento,
                alu_whatsapp as whatsapp,
                alu_endlogradouro as endereco,
                alu_endnumero as numero,
                alu_endcomplemento as complemento,
                alu_endbairro as bairro,
                alu_endcep as cep,
                alu_email as email,
                \'\' as anamnese
            ')
            ->where('alu_id', '=', $id)
            ->first();
    }
}
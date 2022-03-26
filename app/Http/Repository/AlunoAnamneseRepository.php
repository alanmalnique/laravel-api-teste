<?php

namespace App\Http\Repository;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Builder;

class AlunoAnamneseRepository extends Repository
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
        $query = $this->applyFilters($this->query(), $filters);
        if($perPage == -1){
            $perPage = $query->count();
        }
        return $query->paginate($perPage);
    }

    public function anamnese($aluno)
    {
        return $this->query()
            ->selectRaw('
                anam_praticaatividade as pratica_atividade,
                anam_qualatividade as quais_atividades,
                anam_tomamedicamento as toma_medicamento,
                anam_qualmedicamento as quais_medicamentos,
                anam_fumante as fumante,
                anam_fumaquantotempo as fumante_tempo,
                anam_hipertensao as possui_hipertensao,
                anam_doenca as possui_doenca,
                anam_qualdoenca as quais_doencas,
                anam_apresentador as apresenta_dor,
                anam_qualdor as quais_dores,
                anam_qualmovimentosentedor as movimento_dor,
                anam_fezcirurgia as realizou_cirurgia,
                anam_cirurgiaonde as quais_cirurgias,
                anam_tempocirurgia as tempo_ultima_cirurgia,
                anam_objetivo as objetivo
            ')
            ->where('alu_id', '=', $aluno)
            ->first();
    }
}
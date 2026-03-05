<?php

namespace App\Services;

use App\Models\Medicament;

class MedicamentService
{
    public function getListMedicament($id_medicament){
        $liste=Medicament::query()
            ->select('medicament.*', 'etat.lib_etat')
            ->join('etat', 'etat.id_etat', '=', 'frais.id_etat')
            ->where('id_visiteur',"=", $id_visiteur)
            ->get();
        return $liste;
    }
}

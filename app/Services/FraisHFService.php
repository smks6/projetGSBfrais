<?php

namespace App\Services;

use App\Exceptions\UserException;
use App\Models\FraisHF;
use Illuminate\Database\QueryException;

class FraisHFService
{
    public function getListFraisHF($id)
    {
        try {
            $liste=FraisHF::query()
                ->select('fraishorsforfait.*', 'frais.id_frais')
                ->join('frais', 'fraishorsforfait.id_frais', '=', 'frais.id_frais')
                ->where('frais.id_frais','=', $id)
                ->orderBy('date_fraishorsforfait')
                ->get();
        }catch (QueryException $exception){
            $userMessage = "Impossible d'acceder a la base de donnée";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
      return $liste;
    }

    public function getTotalHF($id)
    {
        return FraisHF::where('id_frais', $id)->sum('montant_fraishorsforfait');
    }
}

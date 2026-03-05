<?php

namespace App\Services;
use App\Exceptions\UserException;
use App\Models\Etat;
use App\Models\Frais;
use Illuminate\Database\QueryException;

class FraisService
{
    public function getListFrais($id_visiteur){
        $liste=Frais::query()
            ->select('frais.*', 'etat.lib_etat')
            ->join('etat', 'etat.id_etat', '=', 'frais.id_etat')
            ->where('id_visiteur',"=", $id_visiteur)
            ->get();
        return $liste;
    }

    public function saveFrais($frais){
        $frais->save();
        try {
            $frais=Frais::query()->find($frais);
        }catch (QueryException $exception){
            $userMessage="Impossible d'acceder a la base de données";
            throw new UserException($userMessage, $exception->getCode(), $exception->getMessage());
        }
        return $frais;
    }

    public function getFrais($id){
        $frais=Frais::query()->find($id);
        return $frais;
    }

    public function deleteFrais($id)
    {
        try {
            $frais=Frais::query()->find($id);
            $frais->delete();
        }catch(QueryException $exception){
            if ($exception->getCode() == 23000) {
                $userMessage="Impossible de supprimer une fiche avec des frais de saisie";
            }else{
                $userMessage="Erreur de suppression dans la base de données";
            }
            throw new UserException($userMessage, $exception->getCode(), $exception->getMessage());
        }

    }

    public function getListEtats(){
       return Etat::query()->get();
    }

}

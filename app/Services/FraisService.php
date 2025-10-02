<?php

namespace App\Services;
use App\Models\Etat;
use App\Models\Frais;

class FraisService
{
    public function getListFrais($id_visiteur){
        $liste=Frais::query()->where('id_visiteur','=', $id_visiteur)->get();
        return $liste;
    }

    public function saveFrais($frais){
        $frais->save();
    }

    public function getFrais($id){
        $frais=Frais::query()->find($id);
        return $frais;
    }

   public function getListEtats(){
       return Etat::query()->get();
    }
}

<?php

namespace App\Http\Controllers;
use App\Exceptions\UserException;
use App\Services\FraisService;
use App\Models\Frais;

use App\Services\VisiteurService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FraisController extends Controller
{
    public function listFrais(){
        try {
            $service=new FraisService();
            $id_visiteur=session('id_visiteur');
            $fiches=$service->getListFrais($id_visiteur);
            return view('listFrais', compact('fiches'));
        }catch (QueryException $exception){
            $userMessage="Erreur d'acces a la base de données";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }

    public function addFrais()
    {
        try {
            $service=new FraisService();
            $frais = new Frais();
            $frais->annemois = date("Y-m");
            $etats=$service->getListEtats();
            return view('formFrais', compact('frais', 'etats'));
        } catch (QueryException $exception) {
            $userMessage = "Erreur d'acces a la base de données";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }

    public function validFrais(Request $request){
        try{
            $id_frais = $request->input('id');
            if ($id_frais){
                $frais = Frais::find($id_frais);
            }else{
                $frais = new Frais();
                $frais->id_etat = 2;
            }
            $frais->id_visiteur = session('id_visiteur');
            $frais->anneemois = $request->input('mois');
            $frais->nbjustificatifs = $request->input('nbjustif');
            $frais->montantvalide = $request->input('valide');

            if ($id_frais){
                $frais->id_etat = $request->input('etat');
            }
            $frais->datemodification = date("Y-m-d");
            $service = new FraisService();
            $service->saveFrais($frais);
            return redirect('/listerFrais');
        }catch (QueryException $exception){
            $userMessage = "Erreur d'accès à la base de données";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }


    public function editFrais($id)
    {
        try {
            $service=new FraisService();
            $frais=$service->getFrais($id);
            $etats=$service->getListEtats();
            return view('formFrais', compact('frais','etats'));
        }catch (QueryException $exception){
            $userMessage="Erreur d'acces a la base de données";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }
}

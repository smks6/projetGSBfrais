<?php

namespace App\Http\Controllers;

use App\Services\FraisService;
use App\Services\FraisHFService;
use Illuminate\Http\Request;
use Exception;

class FraisHFController extends Controller
{
    public function listFraisHF($id)
    {
        try {
            $fraisService = new FraisService();
            $fraisHFService = new FraisHFService();

            $frais = $fraisService->getFrais($id);
            $listeHF = $fraisHFService->getListFraisHF($id);
            $totalHF = $fraisHFService->getTotalHF($id);

            return view('listFraisHF', compact('frais', 'listeHF', 'totalHF'));
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }


    public function addFraisHF($id)
    {
        try {
            $fraisHF = new FraisHF();
            $id_frais=$fraisHF->id_fraishorsforfait;
            return view('formFraisHF', compact('fraisHF', 'id_frais', 'id'.'fraisHF'));
        } catch (Exception $exception){
            return view('error', compact('exception'));
        }
    }
}

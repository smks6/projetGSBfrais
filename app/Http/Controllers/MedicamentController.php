<?php

namespace App\Http\Controllers;
use App\Services\MedicamentService;
use Illuminate\Http\Request;
use Exception;
class MedicamentController
{
    public function listMed(){
        try {
            $service=new MedicamentService();
            $id_medicament=session('id_medicament');
            $medicament=$service->getListMedicament($id_medicament);
            return view('listMedicament', compact('medicament'));
        }catch (Exception $exception){
            return view('error', compact('exception'));
        }
    }
}

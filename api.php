<?php

use http\Env\Request;
use http\Exception;
public function initPasswordAPI(Request $request)
{
    try {
        $request->validate(['pwd_visiteur' => 'required|min:3']);
        $hash = bcrypt($request->json('pwd_visiteur'));
        Visiteur::query()->update(['pwd_visiteur' => $hash]);
    }catch (Exception $exception){
        return response()->json(["ERREUR" => $exception->getMessage()], 500);
    }
};

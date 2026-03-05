@extends('layouts.master')

@section('content')
    <form method="POST" action="{{ url('/validerFraisHF') }}">
        {{csrf_field() }}
        <h1>Ajouter Frais Hors Forfait</h1>
        <div class="col-md-12 card card-body bg-light">
            <div class="form-group">
                <label class="col-md-3">Date</label>
                <div class="col-md-6">
                    <input type="text" name="mois" class="form-control" maxlength="7" value="{{$ficheHF->date_fraishorsforfait}}" placeholder="MM-AAAA" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Libellé</label>
                <div class="col-md-6">
                    <input type="text" name="lib_horsforfait" class="form-control" maxlength="" value="{{$ficheHF->lib_horsforfait}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Montant Hors Forfait</label>
                <div class="col-md-6">
                    <input type="number" name="total" class="form-control " min="0" step="0.01" value="" disabled>
                </div>
            </div>
            <div class="col-md-12 col-md-offset-3">
                <a href="{{url('/listerFraisHF/'.$frais->id_frais)}}" class="btn btn-info @if(!$frais->id_frais)@endif">Frais hors forfait</a>
                <a href="{{url('/listerFraisF/'.$frais->id_frais)}}" class="btn btn-info @if(!$frais->id_frais)disabled @endif">Frais au forfait</a>
                <input type="hidden" name="id" value="{{$frais->id_frais}}">
            </div>
            <div class="form-group">
                <label class="col-md-3">Nb justificatifs</label>
                <div class="col-md-6">
                    <input type="number" name="nbjustif" class="form-control" min="0" value="{{$frais->nbjustificatifs}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Montant validé</label>
                <div class="col-md-6">
                    <input type="number" name="valide" class="form-control" min="0" step="0.01" value="{{$frais->montantvalide}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Etat</label>
                <div class="col-md-6">
                    <select name="etat" class="form-select">
                        @foreach($etats as $etat)
                            <option value="{{ $etat->id_etat }}" @if($frais->id_etat == $etat->id_etat) selected @endif>
                                {{ $etat->lib_etat }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <hr>
            <div class="form-group">
                <div class="col-md-12 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        Valider
                    </button>
                    <button type="button" class="btn btn-secondary"
                            onclick="if (confirm('Annuler la saisie ?')) window.location='{{url('/')}}';">
                        Annuler
                    </button>
                    @if(isset($frais) && $frais->id_frais)
                        <a href="{{ url('/supprimerFrais/' . $frais->id_frais) }}"
                           id="suppr" class="btn btn-danger"
                           onclick="return confirm('Supprimer cette fiche de frais ?')">
                            Supprimer
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </form>

    @if(isset($erreur))
        <div class="alert alert-danger" role="alert">{{ $erreur }}</div>
    @endif
@endsection

@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Frais Hors Forfait de la fiche :</h2>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>Date</th>
                <th>Libellé</th>
                <th>Montant</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($listeHF as $forfaitHF)
                <tr>
                    <td>{{$forfaitHF->date_fraishorsforfait}}</td>
                    <td>{{$forfaitHF->lib_fraishorsforfait}}</td>
                    <td>{{$forfaitHF->montant_fraishorsforfait}}</td>
                    <td><a href="{{ url('/editerFraisHF/'.$forfaitHF->id_fraishorsforfait) }}"><i class="bi bi-pencil"></i></a>
                    </td>
                    <td><a href="{{ url('/supprimerFraisHF/' . $forfaitHF->id_fraishorsforfait) }}"
                           id="suppr" class="btn btn-danger"
                           onclick="return confirm('Supprimer cette fiche Hors Forfait ?')">
                            <i class="bi bi-trash3"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <button  type="submit" class="btn btn-primary"><a href="{{route('addFraisHF', $frais->id_frais)}}">
            Ajouter</a>
        </button>
        <button type="button" class="btn btn-secondary"
                onclick="if (confirm('Retour a la page lister ?')) window.location='{{url('/listerFrais')}}';">
            Retour
        </button>
    </div>
@endsection

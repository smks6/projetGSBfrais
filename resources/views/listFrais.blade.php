@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Liste des fiches de frais</h2>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>Mois</th>
                <th>Montant saisi</th>
                <th>Nb justificatifs</th>
                <th>Montant validé</th>
                <th>État</th>
                <th>Modifier</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fiches as $frais)
                <tr>
                    <td>{{ $frais->anneemois }}</td>
                    <td></td>
                    <td>{{ $frais->nbjustificatifs }}</td>
                    <td>{{ $frais->montantvalide }}</td>
                    <td>{{ $frais->id_etat }}</td>
                    <td><a href="modifier">Modifier</a> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

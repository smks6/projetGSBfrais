@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Liste des medicaments</h2>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>Depôt legal</th>
                <th>Nom commercial</th>
                <th>Effet</th>
                <th>Contre indication</th>
                <th>Prix echantillon</th>

            </tr>
            </thead>
            <tbody>
            @foreach($medicament as $med)
                <tr>
                    <td>{{$med->depot_legal}}</td>
                    <td>{{$med->nom_commercial}}</td>
                    <td>{{$med->effets}}</td>
                    <td>{{$med->contre_indication}}</td>
                    <td>{{$med->prix_echantillon}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

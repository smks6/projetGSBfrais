@extends("layouts.master")

@section("content")
    <form method="POST" action="{{url('/authentifier')}}">
        {{csrf_field() }}

        <h1>Authentification</h1>
        <div class="col-md-12 card card-body bg-light">
            <div class="form-group">
                <label class="col-md-6">Identifiant :</label>
                <div class="col-md-6">
                    <input type="text" name="id" value="" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Mot de passe : </label>
                <div class="col-md-6">
                    <input type="password" name="mdp" value="" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        Valider
                    </button>
                    <button type="button" class="btn btn-secondary"
                            onclick="if (confirm('Annuler la saisie ?')) window.location='{{url('/')}}';">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

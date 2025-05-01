@extends('master')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Tableau de bord Administrateur</h2>

    <div class="d-flex flex-column gap-3">
        <a href="{{ route('livres.index') }}" class="btn btn-primary w-100">
             Liste des Livres
        </a>

        <a href="{{ route('auteurs.index') }}" class="btn btn-info text-white w-100">
             Liste des Auteurs
        </a>

        <a href="{{ route('emprunts.create') }}" class="btn btn-success w-100">
             Ajouter un emprunt
        </a>

        <a href="{{ route('livres.retour-form') }}" class="btn btn-warning w-100">
             Retourner un livre
        </a>

        <a href="{{ route('evaluations.create') }}" class="btn btn-secondary w-100">
             Ajouter une évaluation
        </a>

        <a href="{{ route('livres.toplivres') }}" class="btn btn-dark w-100">
             Livres les mieux notés
        </a>
    </div>
</div>
@endsection

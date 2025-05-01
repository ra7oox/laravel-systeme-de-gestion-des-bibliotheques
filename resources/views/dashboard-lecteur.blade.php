@extends('master')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Tableau de bord Lecteur</h2>
    
    <div class="d-flex flex-column gap-3">
        <a href="{{ route('livres.index') }}" class="btn btn-primary w-100">
            Liste des Livres
       </a>
        <a href="{{ route('emprunts.create') }}" class="btn btn-primary w-100">
            Ajouter un emprunt
        </a>

        <a href="{{ route('livres.retour-form') }}" class="btn btn-warning w-100">
            Retourner un livre
        </a>

        <a href="{{ route('evaluations.create') }}" class="btn btn-success w-100">
            Ajouter une évaluation
        </a>
    </div>
</div>
@endsection

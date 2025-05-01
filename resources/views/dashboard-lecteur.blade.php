@extends('master')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">📚 Tableau de Bord Lecteur</h2>

    <div class="row row-cols-1 row-cols-md-2 g-4">

        {{-- Liste des Livres --}}
        <div class="col">
            <div class="card shadow-sm border-primary h-100">
                <div class="card-body text-center">
                    <h5 class="card-title mb-3 text-primary">📖 Voir les Livres</h5>
                    <p class="card-text">Consultez la liste complète des livres disponibles à la bibliothèque.</p>
                    <a href="{{ route('livres.index') }}" class="btn btn-outline-primary w-100">Accéder</a>
                </div>
            </div>
        </div>

        {{-- Ajouter un emprunt --}}
        <div class="col">
            <div class="card shadow-sm border-success h-100">
                <div class="card-body text-center">
                    <h5 class="card-title mb-3 text-success">📥 Emprunter un Livre</h5>
                    <p class="card-text">Enregistrez un nouveau prêt dans votre compte lecteur.</p>
                    <a href="{{ route('emprunts.create') }}" class="btn btn-outline-success w-100">Ajouter un Emprunt</a>
                </div>
            </div>
        </div>

        {{-- Retourner un livre --}}
        <div class="col">
            <div class="card shadow-sm border-warning h-100">
                <div class="card-body text-center">
                    <h5 class="card-title mb-3 text-warning">🔄 Retourner un Livre</h5>
                    <p class="card-text">Indiquez les livres que vous avez retournés à la bibliothèque.</p>
                    <a href="{{ route('livres.retour-form') }}" class="btn btn-outline-warning w-100">Retourner un Livre</a>
                </div>
            </div>
        </div>

        {{-- Ajouter une évaluation --}}
        <div class="col">
            <div class="card shadow-sm border-secondary h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-secondary mb-3">⭐ gerer les Évaluation</h5>
                    <p class="card-text">Attribuer une note à un livre au nom d’un lecteur.</p>
                    <a href="{{ route('evaluations.index') }}" class="btn btn-outline-secondary w-100">Voir</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

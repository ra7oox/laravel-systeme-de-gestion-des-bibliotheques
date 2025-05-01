@extends('master')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">🛠️ Tableau de Bord Administrateur</h2>

    <div class="row row-cols-1 row-cols-md-2 g-4">

        {{-- Liste des Livres --}}
        <div class="col">
            <div class="card shadow-sm border-primary h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary mb-3">📚 Gérer les Livres</h5>
                    <p class="card-text">Afficher, modifier ou supprimer les livres enregistrés.</p>
                    <a href="{{ route('livres.index') }}" class="btn btn-outline-primary w-100">Accéder</a>
                </div>
            </div>
        </div>

        {{-- Liste des Auteurs --}}
        <div class="col">
            <div class="card shadow-sm border-info h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-info mb-3">✍️ Gérer les Auteurs</h5>
                    <p class="card-text">Consulter ou mettre à jour les informations des auteurs.</p>
                    <a href="{{ route('auteurs.index') }}" class="btn btn-outline-info w-100">Accéder</a>
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

        {{-- Livres les mieux notés --}}
        <div class="col">
            <div class="card shadow-sm border-dark h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-dark mb-3">🏆 Livres les Mieux Notés</h5>
                    <p class="card-text">Voir les livres ayant les meilleures évaluations.</p>
                    <a href="{{ route('livres.toplivres') }}" class="btn btn-outline-dark w-100">Voir</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

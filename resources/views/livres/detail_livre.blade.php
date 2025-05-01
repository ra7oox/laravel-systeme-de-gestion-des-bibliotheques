@extends('master')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Détails du Livre</h2>

        <!-- Détails du livre -->
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">{{ $livre->titre }}</h3>
                <h5 class="card-subtitle mb-2 text-muted">{{ $auteur->nom }} {{ $auteur->prenom }} - {{ $auteur->nationalite }}</h5>
                <p class="card-text">{{ $livre->description }}</p>
                <p><strong>Disponibilité :</strong> {{ $livre->disponibilite ? 'Disponible' : 'Non Disponible' }}</p>
                
                <!-- Bouton retour à la liste des livres -->
                <a href="{{ route('livres.index') }}" class="btn btn-secondary">Retour à la Liste</a>
            </div>
        </div>

        <!-- Évaluations du livre -->
        <div class="mt-4">
            <h4>Évaluations Associées</h4>
            @foreach ($evaluations as $evaluation)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Note : {{ $evaluation->note }}/5</h5>
                        <p class="card-text"><strong>Commentaire :</strong> {{ $evaluation->commentaire }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

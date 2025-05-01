@extends("master")
@section('content')

<div class="container py-5">
    <h2 class="mb-4">👤 Détails de l'Auteur</h2>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="card-title">{{ $auteur->nom }} {{ $auteur->prenom }}</h4>
            <p class="card-text">🌍 Nationalité : {{ $auteur->nationalite }}</p>
            <a href="{{ route('auteurs.index') }}" class="btn btn-primary">⬅ Retour à la liste</a>
        </div>
    </div>

    <h3 class="mb-3">📚 Liste de ses Livres</h3>

    @if($livres->isEmpty())
        <div class="alert alert-warning">Cet auteur n'a encore écrit aucun livre.</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($livres as $livre)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $livre->titre }}</h5>
                            <p class="card-text">{{ $livre->description }}</p>
                            <a href="{{ route('livres.show', $livre->id) }}" class="btn btn-outline-info btn-sm">Voir Détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection

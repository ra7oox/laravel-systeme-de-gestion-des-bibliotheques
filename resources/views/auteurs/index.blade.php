@extends("master")

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">📖 Liste des Auteurs</h2>
        @can('create-auteur')
        <a href="{{ route('auteurs.create') }}" class="btn btn-success">➕ Ajouter un Auteur</a>
            
        @endcan
    </div>

    @if($auteurs->isEmpty())
        <div class="alert alert-info">Aucun auteur enregistré pour le moment.</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($auteurs as $auteur)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $auteur->nom }} {{ $auteur->prenom }}</h5>
                            <p class="card-text">🌍 Nationalité : {{ $auteur->nationalite }}</p>

                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('auteurs.show', $auteur->id) }}" class="btn btn-outline-info btn-sm">
                                    👁️ Détails
                                </a>
                                <a href="{{ route('auteurs.edit', $auteur->id) }}" class="btn btn-warning btn-sm">
                                    ✏️ Modifier
                                </a>
                                <form action="{{ route('auteurs.destroy', $auteur->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression de cet auteur ?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">🗑️ Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

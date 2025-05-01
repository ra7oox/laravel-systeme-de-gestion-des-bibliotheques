@extends('master')

@section('content')
<div class="container py-5">

    {{-- 🔍 Formulaire de recherche par auteur --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">🔍 Rechercher par Auteur</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('livres.recherche') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-9">
                    <select name="auteur_id" class="form-select" required>
                        <option value="">-- Sélectionner un auteur --</option>
                        @foreach ($auteurs as $auteur)
                            <option value="{{ $auteur->id }}" {{ request('auteur_id') == $auteur->id ? 'selected' : '' }}>
                                {{ $auteur->nom }} {{ $auteur->prenom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">Rechercher</button>
                </div>
            </form>
        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
    </div>
@endif
    <div class="d-flex justify-content-between align-items-center mb-3">
      
        <h2 class="mb-0">📚 Liste des Livres</h2>
        @can("create-livre")
        <a href="{{ route('livres.create') }}" class="btn btn-success">
            ➕ Ajouter un Livre
        </a>
        @endcan
    </div>

    @if($livres->isEmpty())
        <div class="alert alert-warning">Aucun livre trouvé pour cet auteur.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle shadow-sm">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Auteur</th>
                        <th style="width: 230px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($livres as $livre)
                        <tr>
                            <td>{{ $livre->titre }}</td>
                            <td>{{ $livre->description }}</td>
                            <td>{{ $livre->auteur->nom }} {{ $livre->auteur->prenom }}</td>
                            <td class="text-center">
                                <a href="{{ route('livres.show', $livre->id) }}" class="btn btn-info btn-sm me-1">
                                    <i class="fas fa-eye"></i> Détails
                                </a>
                                @can('edit-livre', $livre)
                                <a href="{{ route('livres.edit', $livre->id) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                @endcan
                                @can('delete-livre', $livre)

                                <form action="{{ route('livres.destroy', $livre->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">
                                        <i class="fas fa-trash-alt"></i> Supprimer
                                    </button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

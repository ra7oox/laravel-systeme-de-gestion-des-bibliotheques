@extends("master")

@section('content')
<div class="container mt-4">
    <h2>Modifier le livre</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreur !</strong> Veuillez corriger les champs ci-dessous :
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livres.update', $livre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{ old('titre', $livre->titre) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $livre->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="auteur_id" class="form-label">Auteur</label>
            <select name="auteur_id" class="form-control" required>
                <option value="">-- Sélectionner un auteur --</option>
                @foreach ($auteurs as $auteur)
                    <option value="{{ $auteur->id }}" {{ $livre->auteur_id == $auteur->id ? 'selected' : '' }}>
                        {{ $auteur->nom }}
                        {{ $auteur->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('livres.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection

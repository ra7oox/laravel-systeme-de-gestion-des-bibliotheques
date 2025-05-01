@extends("master")

@section('content')
<div class="container py-5">
    <h2 class="mb-4">➕ Ajouter un Auteur</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreur !</strong> Veuillez corriger les erreurs ci-dessous :
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('auteurs.store') }}" method="POST" class="card shadow-sm p-4">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
        </div>

        <div class="mb-3">
            <label for="nationalite" class="form-label">Nationalité</label>
            <input type="text" name="nationalite" class="form-control" value="{{ old('nationalite') }}" required>
        </div>

        <button type="submit" class="btn btn-success">✅ Enregistrer</button>
        <a href="{{ route('auteurs.index') }}" class="btn btn-secondary">↩️ Annuler</a>
    </form>
</div>
@endsection

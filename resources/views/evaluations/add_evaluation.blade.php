@extends('master')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">📚 Ajouter une Évaluation</h4>
        </div>
        <div class="card-body">

            <!-- Message d'erreur -->
            @if (session('error'))
                <div class="alert alert-danger">
                    ❌ {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('evaluations.store') }}" method="POST">
                @csrf

                <!-- Sélection du livre -->
                <div class="mb-3">
                    <label for="livre_id" class="form-label fw-semibold">📖 Livre</label>
                    <select name="livre_id" id="livre_id" class="form-select" required>
                        <option value="">Sélectionner un livre</option>
                        @foreach ($livres as $livre)
                            <option value="{{ $livre->id }}">{{ $livre->titre }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="lecteur_id" value="{{ Auth::user()->id }}">

                <!-- Note -->
                <div class="mb-3">
                    <label for="note" class="form-label fw-semibold">⭐ Note (1 à 5)</label>
                    <input type="number" name="note" id="note" class="form-control" min="1" max="5" required>
                </div>

                <!-- Commentaire -->
                <div class="mb-3">
                    <label for="commentaire" class="form-label fw-semibold">💬 Commentaire (optionnel)</label>
                    <textarea name="commentaire" id="commentaire" class="form-control" rows="3"></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">✅ Soumettre l'évaluation</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

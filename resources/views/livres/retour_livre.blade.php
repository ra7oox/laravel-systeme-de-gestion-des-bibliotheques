@extends('master')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">📚 Emprunter un Livre</h4>
        </div>
        <div class="card-body">

            <!-- Affichage des erreurs -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Erreurs rencontrées :</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Message de succès -->
            @if(session('success'))
                <div class="alert alert-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <!-- Message d'erreur -->
            @if(session('error'))
                <div class="alert alert-danger">
                    ❌ {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('livres.store') }}" method="POST">
                @csrf

                <!-- Sélection du livre -->
                <div class="mb-3">
                    <label for="livre_id" class="form-label fw-semibold">📖 Livre à emprunter</label>
                    <select name="livre_id" id="livre_id" class="form-select" required>
                        <option value="">-- Sélectionner un livre --</option>
                        @foreach ($livres as $livre)
                            <option value="{{ $livre->id }}">{{ $livre->titre }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Date de retour -->
                <div class="mb-3">
                    <label for="date_retour" class="form-label fw-semibold">📅 Date de retour prévue</label>
                    <input type="date" name="date_retour" id="date_retour" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">✅ Confirmer l'emprunt</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

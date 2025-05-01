@extends('master')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">📚 Ajouter un Emprunt</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('emprunts.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="livre_id" class="form-label fw-bold">📖 Livre</label>
                    <select name="livre_id" id="livre_id" class="form-select" required>
                        <option value="">-- Sélectionner un livre --</option>
                        @foreach ($livres as $livre)
                            <option value="{{ $livre->id }}" {{ old('livre_id') == $livre->id ? 'selected' : '' }}>
                                {{ $livre->titre }}
                            </option>
                        @endforeach
                    </select>
                    @error('livre_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lecteur_id" class="form-label fw-bold">👤 Lecteur</label>
                    <select name="lecteur_id" id="lecteur_id" class="form-select" required>
                        <option value="">-- Sélectionner un lecteur --</option>
                        @foreach ($lecteurs as $lecteur)
                            <option value="{{ $lecteur->id }}" {{ old('lecteur_id') == $lecteur->id ? 'selected' : '' }}>
                                {{ $lecteur->nom }} {{ $lecteur->prenom }}
                            </option>
                        @endforeach
                    </select>
                    @error('lecteur_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date_emprunt" class="form-label fw-bold">📅 Date d'Emprunt</label>
                    <input type="date" name="date_emprunt" id="date_emprunt" class="form-control" value="{{ old('date_emprunt') }}" required>
                    @error('date_emprunt')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="date_retour" class="form-label fw-bold">📆 Date de Retour</label>
                    <input type="date" name="date_retour" id="date_retour" class="form-control" value="{{ old('date_retour') }}">
                    @error('date_retour')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">
                        ✅ Ajouter l'Emprunt
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


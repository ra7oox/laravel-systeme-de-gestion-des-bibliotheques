@extends('master')

@section('content')
<div class="container mt-4">
    <h2>Livres les mieux notés</h2>

    @foreach ($livres as $livre)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $livre->titre }}</h5>
                <p>{{ $livre->description }}</p>
                <p><strong>Moyenne des notes :</strong> {{ number_format($livre->moyenne, 2) ?? 'Pas de notes' }}</p>
                <a href="{{ route('livres.show', $livre->id) }}" class="btn btn-info">Voir Détails</a>
            </div>
        </div>
    @endforeach
</div>
@endsection

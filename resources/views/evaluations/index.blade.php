@extends('master')
@section('content')

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">📝 Liste des Évaluations</h2>
        @can('create-evaluation')
        <a href="{{ route('evaluations.create') }}" class="btn btn-success">➕ Ajouter une Évaluation</a>
            
        @endcan
    </div>

    @if($evaluations->isEmpty())
        <div class="alert alert-info">Aucune évaluation enregistrée pour le moment.</div>
    @else
        <div class="row row-cols-1 g-4">
            @foreach ($evaluations as $evaluation)
                <div class="col">
                    <div class="card shadow-sm border-start border-4 border-primary">
                        <div class="card-body">
                            <h5 class="card-title">📖 Livre : <strong>{{ $evaluation->livre->titre }}</strong></h5>
                            <p class="mb-1"><strong>Auteur :</strong> {{ $evaluation->livre->auteur->nom }}</p>
                            <p class="mb-1"><strong>Disponible :</strong> {{ $evaluation->livre->disponible ? 'Oui' : 'Non' }}</p>
                            
                            <hr>
                            
                            <p class="mb-1"><strong>👤 Lecteur :</strong> {{ $evaluation->lecteur->nom }} {{ $evaluation->lecteur->prenom }}</p>
                            <p class="mb-1"><strong>Email :</strong> {{ $evaluation->lecteur->email }}</p>
                            
                            <hr>

                            <p class="mb-1"><strong>⭐ Note :</strong> {{ $evaluation->note }}/5</p>
                            <p class="mb-0"><strong>💬 Commentaire :</strong> {{ $evaluation->commentaire }}</p>
                        </div>
                        @can("delete-evaluation",$evaluation)
                        <form action="{{route("evaluations.destroy",$evaluation->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        @endcan
                    </div>
                   
                </div>
               
            @endforeach
        </div>
    @endif
    
</div>

@endsection

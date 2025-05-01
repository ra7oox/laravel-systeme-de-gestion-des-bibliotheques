{{-- resources/views/errors/403.blade.php --}}
@extends('master')

@section('content')
<div class="container text-center py-5">
    <h1 class="display-1 text-danger">403</h1>
    <h3 class="mb-4">🚫 Action non autorisée</h3>
    <p>Vous n’avez pas la permission d’effectuer cette action.</p>
    @if (Auth::user()->account_type=="admin")
    <a href="{{ route("dashboard-admin") }}" class="btn btn-primary mt-3">⬅️ Retour</a>
    @else
    <a href="{{ route("dashboard-lecteur") }}" class="btn btn-primary mt-3">⬅️ Retour</a>

    @endif
</div>
@endsection

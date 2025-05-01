<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use App\Models\Evaluation;
use App\Models\Lecteur;
use App\Models\Livre;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $livres=Livre::all();
        $lecteurs=Lecteur::all();
        return view("evaluations.add_evaluation",compact("livres","lecteurs"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'livre_id' => 'required|exists:livres,id',
        'lecteur_id' => 'required|exists:lecteurs,id',
        'note' => 'required|integer|min:1|max:5',
        'commentaire' => 'nullable|string',
    ]);

    // Vérifier si ce lecteur a déjà emprunté ce livre
    $aEmprunte = Emprunt::where('livre_id', $request->livre_id)
        ->where('lecteur_id', $request->lecteur_id)
        ->exists();

    if (! $aEmprunte) {
        return back()->with('error', 'Ce lecteur n\'a jamais emprunté ce livre.');
    }

    Evaluation::create([
        'livre_id' => $request->livre_id,
        'lecteur_id' => $request->lecteur_id,
        'note' => $request->note,
        'commentaire' => $request->commentaire,
    ]);

    return redirect()->route('livres.index')->with('success', 'Évaluation ajoutée avec succès.');
}


    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}

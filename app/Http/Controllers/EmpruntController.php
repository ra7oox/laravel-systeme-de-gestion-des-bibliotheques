<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use App\Models\Lecteur;
use App\Models\Livre;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;
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
        $this->authorize("emprunt-livre");
        return view("emprunts.add_emprunt",compact("livres","lecteurs"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $this->authorize("emprunt-livre");

    // Validation des données d'entrée
    $request->validate([
        "livre_id" => "required|exists:livres,id", // Vérifie que le livre existe
        "lecteur_id" => "required|exists:lecteurs,id", // Vérifie que le lecteur existe
        "date_emprunt" => "required|date", // Assure que la date d'emprunt est valide
        "date_retour" => "nullable|date|after_or_equal:date_emprunt", // Permet à date_retour d'être null, ou doit être une date après la date d'emprunt
    ]);

    // Récupère le livre par son ID
    $livre = Livre::find($request->livre_id);

    // Vérifie si le livre est disponible
    if ($livre->disponible == 0) {
        // Retourne un message d'erreur si le livre n'est pas disponible
        return back()->with("error", "Ce livre n'est pas disponible.");
    }

    // Création de l'emprunt dans la base de données
    try {
        Emprunt::create([
            "livre_id" => $request->livre_id,
            "lecteur_id" => $request->lecteur_id,
            "date_emprunt" => $request->date_emprunt,
            "date_retour" => $request->date_retour ?: null, // Si date_retour est vide, on la met à null
        ]);

        // Mise à jour de la disponibilité du livre pour le marquer comme emprunté
        $livre->disponible = 0; // Le livre devient non disponible
        $livre->save(); // Sauvegarde la mise à jour

        // Retourne vers la liste des livres avec un message de succès
        return redirect()->route("livres.index")->with("success", "Emprunt ajouté avec succès !");
    } catch (\Exception $e) {
        // Gère les erreurs lors de la création de l'emprunt
        return back()->with("error", "Une erreur s'est produite lors de l'ajout de l'emprunt. Veuillez réessayer.");
    }
}

    


    /**
     * Display the specified resource.
     */
    public function show(Emprunt $emprunt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emprunt $emprunt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emprunt $emprunt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprunt $emprunt)
    {
        //
    }
}

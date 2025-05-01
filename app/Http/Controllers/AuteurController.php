<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize("view-auteur");

        $auteurs=Auteur::all();
        return view("auteurs.index",compact("auteurs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create-auteur");
        return view("auteurs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'nationalite' => 'required|string|max:100',
        ]);
        $this->authorize("create-auteur");
    
        Auteur::create($request->all());
    
        return redirect()->route('auteurs.index')->with('success', 'Auteur ajouté avec succès !');
    }
    

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $auteur=Auteur::findOrFail($id);
        $livres=$auteur->livres;
        
        return view("auteurs.show",compact("auteur","livres"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auteur $auteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auteur $auteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auteur $auteur)
    {
        //
    }
}

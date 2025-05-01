<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Emprunt;
use App\Models\Evaluation;
use App\Models\Livre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;
    public function index()
    {
        $livres=Livre::where("disponible",1)->get();
        $auteurs=Auteur::all();
        return view("livres.index",compact('livres',"auteurs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create-livre");
       $auteurs=Auteur::all();
       return view("livres.create-livre",compact("auteurs"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 $request->validate([
    "titre"=>"required",
    "description"=>"nullable|min:8",
    "auteur_id"=>"required",
 ]);
 $this->authorize("create-livre");

 Livre::create([
    "titre"=>$request->titre,
    "description"=>$request->description,
    "auteur_id"=>$request->auteur_id,
 ]);

return redirect()->route("livres.index")->with("success", "Livre creé avec succès !");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $livre=Livre::findOrFail($id);
        $auteur=$livre->auteur;
        $evaluations=Evaluation::where("livre_id",$id)->get();
        return view("livres.detail_livre",compact("livre","auteur","evaluations"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $livre=Livre::findOrFail($id);
        $auteurs=Auteur::all();
        $this->authorize("edit-livre",$livre);

        return view("livres.edit-livre",["livre"=>$livre,"auteurs"=>$auteurs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $livre=Livre::findOrFail($id);
        $request->validate([
            "titre"=>"required",
            "description"=>"nullable|min:8",
            "auteur_id"=>"required",
         ]);
        $this->authorize("edit-livre",$livre);

         $livre->update([
            "titre"=>$request->titre,
            "description"=>$request->description,
            "auteur_id"=>$request->auteur_id,
         ]);
return redirect()->route("livres.index")->with("success", "Livre modifier avec succès !");

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $livre=Livre::findOrFail($id);
        $this->authorize("delete-livre",$livre);

        $livre->delete();
return redirect()->route("livres.index")->with("success", "Livre supprimer avec succès !");

    }
    public function recherche(Request $request)
{
    $request->validate([
        'auteur_id' => 'required|exists:auteurs,id'
    ]);

    $livres = Livre::where('auteur_id', $request->auteur_id)->get();
    $auteurs = Auteur::all();

    return view('livres.index', compact('livres', 'auteurs'));
}


public function topLivres()
{
    $livres = Livre::select('livres.*', DB::raw('AVG(evaluations.note) as moyenne'))
        ->leftJoin('evaluations', 'livres.id', '=', 'evaluations.livre_id')
        ->groupBy('livres.id', 'livres.titre', 'livres.description', 'livres.disponible', 'livres.auteur_id', 'livres.created_at', 'livres.updated_at')
        ->orderByDesc('moyenne')
        ->get();

    return view('livres.top', compact('livres'));
}
public function retourLivreForm(){
    $this->authorize("retour-livre");

    $livres=Livre::where("disponible",0)->get();
        
    return view("livres.retour_livre",compact("livres"));
}

public function retourLivre(Request $request){
    $request->validate([
        "livre_id" => "required|exists:livres,id",
        "date_retour" => "required|date",
    ]);
    
    // Récupération du livre
    $livre = Livre::find($request->livre_id);
   

    
    // Récupération de l'emprunt actif (pas encore retourné)
    $emprunt = Emprunt::where("livre_id", $livre->id)
                    ->where("lecteur_id",Auth::user()->id)
                     ->whereNull("date_retour")
                     ->latest()
                     ->first();
    $this->authorize("retour-livre");
    
    if (!$emprunt) {
        return back()->with("error", "Aucun emprunt actif trouvé pour ce livre.");
    }
    
    // Mise à jour de la date de retour
    $emprunt->date_retour = $request->date_retour;
    $emprunt->save();
    
    // Mise à jour de la disponibilité du livre
    $livre->disponible = 1;
    $livre->save();
    
    return redirect()->route("livres.index")->with("success", "Livre retourné avec succès !");
}
}

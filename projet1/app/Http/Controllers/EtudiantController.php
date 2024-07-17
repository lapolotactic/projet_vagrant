<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    // fonction read afficher la liste des etudiants
    public function index() {
        $liste_etudiant = Etudiant::orderBy("nom", "asc")->paginate(5);
        return view('etudiant', compact("liste_etudiant"));
    }

    
    // fonction1 ajouter un etudiant  
    public function create() {
        $classes = Classe::all();
        return view('ajouterEtudiant', compact("classes"));
    }
     
    // fonction2 ajouter un etudiant  
    public function ajouter(Request $request){
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required"
        ]);

        Etudiant::create($request->all());

        return back()->with("success","Etudiant ajouter avec succès");
    }


        // fonction1 modifier un etudiant
        public function edit(Etudiant $etudiant) {
            $classes = Classe::all();
            return view('modifierEtudiant', compact("etudiant", "classes"));
        }

        // fonction2 modifier un etudiant
        public function modifier(Request $request, Etudiant $etudiant){
            $request->validate([
                "nom"=>"required",
                "prenom"=>"required",
                "classe_id"=>"required"
            ]);
    
            $etudiant->update($request->all());
    
            return back()->with("success","Etudiant modifier avec succès");
        }

    
    // fonction supprimer un etudiant
    public function supprimer(Etudiant $etudiant){
        $nom_complet = $etudiant->nom ." ". $etudiant->prenom;
        $etudiant->delete();
     // Etudiant::find( $etudiant)->delete();

        return back()->with("successDelete","L'étudiant '$nom_complet' a été supprimé avec succès");
    }
}

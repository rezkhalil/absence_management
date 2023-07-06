<?php

namespace App\Http\Controllers\Admin;

use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\Semestre;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatiereController extends Controller
{
    public function addMatiere()
    {
        $filieres=Filiere::select('id','nom_filiere')->get();
        $semestres=Semestre::select('id','nom_sem')->get();
        $profs=Enseignant::select('id','nom_ens')->get();
        return view('admin.matiere.addMatiere',compact('filieres','semestres','profs'));
    }
    public function showAllMatiere()
    {

        $matieres=Matiere::with('filieremat','semestre','enseignantMatiere')->get();
       
        return view('admin.matiere.showAll',compact('matieres'));
    }

    public function saveMatiere(Request $request){

        // validation
        $request->validate([
            'nom' => 'required',
            ]);

        // save matiere in DB
        try {

            Matiere::create(
                [
                    'nom_mat' => $request->nom,
                    'id_filiere' => $request->filiere,
                    'id_sem' => $request->semestre,
                    'id_ens' => $request->prof,
                ]
                );

                return redirect()->route('admin.show.all.matiere')->with(['success' => 'Matiere bien Ajoute']);

            } catch (\Exception $ex) {


                return redirect()->route('admin.add.matiere')->with(['error' => 'There is somthing went wrong ']);
        }


    }

    public function editMatiere($id)
    {

        $matiere=Matiere::find($id);
        if(!$matiere)
           redirect() -> route('admin.show.all.matiere') -> with(['error' => 'Matiere Does not exist']);

           $filieres=Filiere::select('id','nom_filiere')->get();
           $semestres=Semestre::select('id','nom_sem')->get();
           $profs=Enseignant::select('id','nom_ens')->get();

           //return $matiere;
        return view('admin.matiere.update',compact('matiere','filieres','semestres','profs'));
    }

    public function updateMatiere(Request $request)
    {

     // validation
     $request->validate([
        'nom' => 'required',
        ]);

      // save changes
      try {

        Matiere::where('id',$request ->id) -> update(
            [
            'nom_mat' => $request->nom,
            'id_filiere' => $request->filiere,
            'id_sem' => $request->semestre,
            'id_ens' => $request->prof,
          ]);

            return redirect()->route('admin.show.all.matiere')->with(['update' => 'Matiere Bien modifie']);

        } catch (\Exception $ex) {


            return redirect()->route('admin.add.matiere')->with(['error' => 'There is somthing went wrong ']);
    }

    }

    public function deleteMatiere($id)
    {
        $matiere=Matiere::find($id);
        if(!$matiere)
           redirect() -> route('admin.show.all.matiere') -> with(['error' => 'Matiere Does not exist']);

           Matiere::where('id',$id) -> delete();
           return redirect()->route('admin.show.all.matiere')->with(['delete' => 'Matiere est supprime avec succes']);
    }

}

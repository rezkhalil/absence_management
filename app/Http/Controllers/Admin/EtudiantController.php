<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Seance;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\Etudiant;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class EtudiantController extends Controller
{
    public function index()
    {
        return view('etudiant.EspaceEtudiant');
    }
     //la fonction qui permet de retourner le data du filiere u
     public function addStudent()
     {
         $filieres=Filiere::select('id','nom_filiere')->get();

         return view('admin.etudiant.addStudent',compact('filieres'));

     }
    // la fonction qui permet d'afficher les information  des etudiants
     public function showAllStudent()
     {
         $students=Etudiant::with('filiere')->get();
          //return $matieres;
         return view('admin/etudiant/showAll',compact('students'));
     }
     //la fonction qui permet d'ajouter et enregistrer les etudiant
     public function saveStudent(Request $request){
           //return $request;
        $user = new User;
        $email= $request->input('email');
        $password =  Hash::make($request->input('password'));
        $name= strstr($email,'@',true);
        // $user->id_role = 1;
        $user->name = $name;
        $user->email = $email;
        $user->password =$password;

        $user->save();
        $iduser = $user->id;

        $etudiant = new Etudiant;
        $cin = $request->input('cin');
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $phone = $request->input('phone');
        $filiere = $request->input('filiere');

        $etudiant->cin = $cin;
        $etudiant->nom_etu = $nom;
        $etudiant->prenom_etu = $prenom;
        $etudiant->phone_etu = $phone;
        $etudiant->phone_etu = $phone;
        $etudiant->id_filiere = $filiere;
        $etudiant->save();

        return redirect()->route('admin.show.all.student')->with(['success' => ' Etudiant est Bien ajouté ']);


     }
    //la fonction utilises dans la modification des données des étudiants
     public function editStudent($id)
     {
         $etudiant=Etudiant::find($id);
         if(!$etudiant)
            redirect() -> route('admin.show.all.student') -> with(['Erreur' => "Etudiant n'existe pas !!!"]);

            $filieres=Filiere::select('id','nom_filiere')->get();
         return view('admin.etudiant.update',compact('filieres','etudiant'));
     }

     //la fonction permet de modifier les données des étudiants
     public function updateStudent(Request $request)
     {

         $request->validate([
             'nom' => 'required',
             'cin'=> 'required ',
             'prenom'=>'required'
             ]);
         try {
             Etudiant::where('id',$request ->id) -> update(
                 [
                     'cin' => $request->cin,
                     'nom_etu' => $request->nom,
                     'prenom_etu' => $request->prenom,
                     'phone_etu' => $request->phone,
                     'id_filiere' => $request->filiere,
                     'id_user'=> 1
                 ]);
                 // un message de success afficher si les données sont bein modifiées
                 return redirect()->route('admin.show.all.student')->with(['update' => ' Etudiant est Bien modifié ']);

             } catch (\Exception $ex) {
                 //  // un message d'erreur  s'il y a pas de modification
                 return redirect()->route('admin.add.student')->with(['error' => 'There is somthing went wrong ']);
         }

     }
   // la fonction qui permet de supprimer un étudiant
     public function deleteStudent($id)
     {
         $student=Etudiant::find($id);
         if(!$student)
            redirect() -> route('admin.show.all.student') -> with(['error' => 'student Does not exist']);

            Etudiant::where('id',$id) -> delete();
            return redirect()->route('admin.show.all.student')->with(['delete' => 'Etudiant est supprime avec succes']);
     }
     public function historiqueAbsence()
{
    $filiere=Filiere::all();
    $matieres = Matiere::all();
    $seances = Seance::with('seancematiere')
    ->where('active',1)
    ->get();

    foreach($seances as $key=>$s){
        $absence[$key] = $s->absences()->get();
    }


   return view('Etudiant.historiqueAbsence',compact('seances','matieres','absence','filiere'));
}

}

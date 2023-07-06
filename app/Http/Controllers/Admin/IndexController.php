<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seance;
use App\Models\Filiere;
use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        return view ('admin.index');
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

       return view('admin.absence.historiqueabsence',compact('seances','matieres','absence','filiere'));
    }
}

<?php

namespace App\Models;

use App\Models\Absence;
use App\Models\Matiere;
use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seance extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','date','heure_debut','heure_fin','id_mat','id_ens'
   ];
   protected $hidden =[
       'created_at','updated_at'
   ];
    public function enseignantseance(){
        return $this->belongsTo(Enseignant::class,'id_ens');


    }
    public function seancematiere(){
        return $this->belongsTo(Matiere::class,'id_mat');


    }
    public function absences()
    {
        return $this->hasMany(Absence::class,'id_sea');

    }
}

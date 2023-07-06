<?php

namespace App\Models;

use App\Models\Seance;
use App\Models\Filiere;
use App\Models\Semestre;
use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matiere extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','nom_mat','id_filiere','id_sem','id_ens'
    ];
    protected $hidden = [
    'created_at','updated_at'
];

    public function filieremat(){
        return $this->belongsTo(Filiere::class,'id_filiere');

    }
    public function semestre(){
        return $this->belongsTo(Semestre::class,'id_sem');

    }
    public function enseignantMatiere(){
        return $this->belongsTo(Enseignant::class,'id_ens');

    }
    public function seancematiere()
    {
        return $this->hasMany(Seance::class)->withTimestamps();

    }
}

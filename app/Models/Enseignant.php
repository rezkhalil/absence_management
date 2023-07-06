<?php

namespace App\Models;

use App\Models\User;
use App\Models\Seance;
use App\Models\Matiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','nom_ens','prenom_ens','phone_ens','adresse_ens','id_user'
    ];
    protected $hidden = [
        'created_at','updated_at'
    ];
    public function userprof(){
        return $this->belongsTo(User::class,'id_user');

    }
    public function MatiereEnseignant()
    {
        return $this->hasMany(Matiere::class)->withTimestamps();

    }
    public function seance()
    {
        return $this->hasMany(Seance::class)->withTimestamps();

    }
}

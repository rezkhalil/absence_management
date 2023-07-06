<?php

namespace App\Models;

use App\Models\User;
use App\Models\Absence;
use App\Models\Filiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filiere extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','cne', 'nom_etu', 'prenom_etu','phone_etu','id_filiere','id_user'
    ];

    public function user(){
        return $this->belongsTo(User::class,'id_user');

    }
    public function filiere(){
        return $this->belongsTo(Filiere::class,'id_filiere');

    }
    public function absenceEtudiant()
    {
        return $this->hasMany(Absence::class)->withTimestamps();

    }
}

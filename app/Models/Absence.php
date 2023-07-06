<?php

namespace App\Models;

use App\Models\Seance;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absence extends Model
{
    use HasFactory;
    protected $fillable = [
        'status','justification','id_sea','id_etu'
    ];

    public function seanceabs(){
        return $this->belongsTo(Seance::class,'id_sea');

    }
    public function etudiantabs(){
        return $this->belongsTo(Etudiant::class,'id_etu');

    }
}

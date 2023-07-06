<?php

namespace App\Models;

use App\Models\Matiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semestre extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_sem'
    ];
    protected $hidden = [
        'created_at','updated_at'
    ];

    public function semestreMatiere()
{
    return $this->hasMany(Matiere::class)->withTimestamps();

}
}

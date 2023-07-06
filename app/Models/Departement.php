<?php

namespace App\Models;

use App\Models\Filiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_dep'
    ];

    public function filieredepartement()
{
    return $this->hasMany(Filiere::class)->withTimestamps();

}
}

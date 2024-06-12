<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_categorie';

    protected $fillable = [
        'code_categorie',
        'nom_categorie'
    ];

    public function matierepremieres()
    {
        return $this->hasMany(matierepremieres::class, 'id_categorie');
    }

    public function Productions(){
        return $this->hasMany(Produits::class, 'id_categorie');
    }
}

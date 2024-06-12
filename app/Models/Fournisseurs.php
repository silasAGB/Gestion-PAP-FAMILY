<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseurs extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_fournisseur';

    protected $fillable = [
        'nom_fournisseur',
        'contact_fournisseur',
        'email_fournisseur',
        'adresse_fournisseur'
    ];

    public function Approvisionnements()
    {
        return $this->hasMany(Approvisionnements::class, 'id_approvisionnement');
    }

    public function matierepremieres()
    {
        return $this->belongsToMany(matierepremieres::class, 'fournisseur_mat', 'id_fournisseur', 'id_MP');
    }
}

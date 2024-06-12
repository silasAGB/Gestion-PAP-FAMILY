<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approvisionnements extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_approvisionnement';

    protected $fillable = [
        'date_approvisionnement',
        'reference_approvisionnement',
        'qte_approvisionnement',
        'montant',
        'id_fournisseur',
    ];

    // Relations

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseurs::class, 'id_fournisseur');
    }

    public function matieresPremieres()
    {
        return $this->belongsToMany(MatierePremieres::class, 'approvisionnement_matiere', 'id_approvisionnement', 'id_MP')->withPivot('quantite', 'prix_unitaire');
    }
}

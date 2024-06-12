<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatierePremieres extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_MP';

    protected $fillable = [
        'nom_MP',
        'prix_achat',
        'qte_stock',
        'seuil_stock',
        'unite',
        'id_categorie'
    ];

    public function categories() {
        return $this->belongsTo(Categories::class, 'id_categorie');
    }

    public function Fournisseurs() {
        return $this->belongsToMany(Fournisseurs::class, 'fournisseur_mat', 'id_MP', 'id_fournisseur');
    }

}


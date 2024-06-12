<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatiereProduit extends Model
{
    protected $primaryKey = 'id_matiere_produit';

    protected $fillable = [
        'id_MP',
        'id_produit',
        'qte',
    ];



    public function matierepremieres()
    {
        return $this->belongsTo(matierepremieres::class, 'id_MP');
    }

    public function Produits()
    {
        return $this->belongsTo(Produits::class, 'id_produit');
    }
}

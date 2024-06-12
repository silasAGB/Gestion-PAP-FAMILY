<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_produit';

    protected $fillable =[
        'reference_produit',
        'nom_produit',
        'description_produit',
        'prix_details_produit',
        'prix_gros_produit',
        'qte_preparation',
        'qte_stock',
        'id_categorie',
    ];

    public function Categories () {
        return $this->belongsTo(Categories::class, 'id_categorie');
    }

    // public function production () {
    //     return $this->hasMany(productions::class, 'id_production');
    // }
}

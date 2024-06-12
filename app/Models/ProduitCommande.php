<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitCommande extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_Produit_commande';

    protected $fillable = [
        'id_Produit',
        'qte_Produit_commande',
        'prix_unitaire',
        'montant_produit_commande',
    ];

    public function Produits()
    {
        return $this->belongsTo(Produits::class, 'id_Produit');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productions extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_production';

    protected $fillable = [
        'date_prevue',
        'date_production',
        'qte_prevue',
        'qte_produite',
        'statut',
        'id_produit',
    ];

    public function produits()
    {
        return $this->belongsTo(Produits::class, 'id_produit');
    }

}

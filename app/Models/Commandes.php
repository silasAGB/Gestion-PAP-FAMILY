<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_Commande';

    protected $fillable = [
        'reference_Commande',
        'date_Commande',
        'montant',
        'statut',
        'adresse_livraison',
        'date_livraison',
        'id_Client',
    ];

    public function Clients()
    {
        return $this->belongsTo(Clients::class, 'id_Client');
    }
}

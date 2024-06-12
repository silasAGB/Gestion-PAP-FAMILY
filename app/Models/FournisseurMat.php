<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FournisseurMat extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_FournisseurMat';

    protected $fillable = [
        'id_fournisseur',
        'id_MP',
    ];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseurs::class, 'id_fournisseur');
    }

    public function MatierePremieres()
    {
        return $this->belongsTo(matierepremieres::class, 'id_MP');
    }
}

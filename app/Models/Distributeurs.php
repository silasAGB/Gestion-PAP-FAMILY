<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributeurs extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_distributeur';

    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
    ];
}

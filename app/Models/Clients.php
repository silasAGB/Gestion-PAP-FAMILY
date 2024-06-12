<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_Client';

    protected $fillable = [
        'nom_Client',
        'Contact_Client',
        'adresse_Client',
    ];
}

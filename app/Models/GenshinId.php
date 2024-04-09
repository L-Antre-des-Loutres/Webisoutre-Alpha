<?php

// app/Models/GenshinId.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenshinId extends Model
{
    use HasFactory;

    protected $table = 'genshin_id';

    // Spécifiez les colonnes de la table SQL
    protected $fillable = [
        'discord_user_id',
        'genshin_user_id'
    ];

    // Fonction pour récupérer un 
}

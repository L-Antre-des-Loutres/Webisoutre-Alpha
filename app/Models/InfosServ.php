<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfosServ extends Model
{
    use HasFactory;

    protected $table = 'infos_serv';
    protected $primaryKey = 'id_serv';
    public $timestamps = false; // Si vous ne souhaitez pas utiliser les timestamps (created_at et updated_at)

    protected $fillable = [
        'nom_serv',
        'modpack',
        'modpack_url',
        'embedColor',
        'embedImage',
        'caption',
        'nom_monde',
        'version_serv',
        'path_serv',
        'actif',
        'nb_joueurs',
    ];

    // Fonction pour récupérer les infos du serveur actif
    public static function getInfosServActif()
    {
        return self::where('actif', 1)->get();
    }
    public static function getInfosWithID($id_serv)
    {
        return self::where('id_serv', $id_serv)->get()->first();
    }
    public static function getAllInfosServ()
    {
        return self::all();
    }
    
}

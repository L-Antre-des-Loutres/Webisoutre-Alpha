<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stats extends Model
{
    use HasFactory;

    protected $table = 'stats_serv';
    protected $fillable = ['uuid_minecraft', 'temp_jeux', 'nb_mort','distTotale', 'id_serv', 'username'];


    // Méthode pour obtenir le total des heures par joueur
    public static function getTotalHoursAndDeathsPerPlayer()
    {
        return self::select(
            'stats_serv.username',
            DB::raw('SUM(stats_serv.temp_jeux) as total_heures'),
            DB::raw('SUM(stats_serv.nb_mort) as total_morts'),
            DB::raw('SUM(stats_serv.distTotale) as total_dist')

        )
            ->groupBy('stats_serv.username')
            ->orderByDesc('total_heures')
            ->get();
    }

    public static function getStatsParJoueurParServeur($serveurNom)
    {
        return self::join('infos_serv', 'stats_serv.id_serv', '=', 'infos_serv.id_serv')
            ->where('infos_serv.nom_serv', $serveurNom)
            ->select(
                'stats_serv.username',
                'infos_serv.nom_serv',
                'infos_serv.id_serv',
                DB::raw('SUM(stats_serv.temp_jeux) as total_heures'),
                DB::raw('SUM(stats_serv.nb_mort) as total_morts'),
                DB::raw('SUM(stats_serv.distTotale) as total_dist')
            )
            ->groupBy('stats_serv.username', 'infos_serv.nom_serv', 'infos_serv.id_serv')
            ->orderByDesc('total_heures')
            ->get();
    }

    public static function getStatsParJoueurParServeurParUUID($serveurNom, $uuid)
    {
        return self::join('infos_serv', 'stats_serv.id_serv', '=', 'infos_serv.id_serv')
            ->where('infos_serv.nom_serv', $serveurNom)
            ->where('stats_serv.uuid_minecraft', $uuid)
            ->select(
                'stats_serv.username',
                'infos_serv.nom_serv',
                'infos_serv.id_serv',
                DB::raw('SUM(stats_serv.temp_jeux) as total_heures'),
                DB::raw('SUM(stats_serv.nb_mort) as total_morts'),
                DB::raw('SUM(stats_serv.distTotale) as total_dist')
            )
            ->groupBy('stats_serv.username', 'infos_serv.nom_serv', 'infos_serv.id_serv')
            ->orderByDesc('total_heures')
            ->get();
    }

    public static function getStatsParJoueurParUUID($uuid)
    {
        return self::select(
            'stats_serv.username',
            DB::raw('SUM(stats_serv.temp_jeux) as total_heures'),
            DB::raw('SUM(stats_serv.nb_mort) as total_morts'),
            DB::raw('SUM(stats_serv.distTotale) as total_dist')
        )
            ->where('stats_serv.uuid_minecraft', $uuid)
            ->groupBy('stats_serv.username')
            ->orderByDesc('total_heures')
            ->get();
    }

    public static function getNbJoueursParIdServ($id_serv)
    {
        return self::select(
            'id_serv',
            DB::raw('COUNT(DISTINCT uuid_minecraft) as nb_joueurs')
        )
            ->where('id_serv', $id_serv)
            ->groupBy('id_serv')
            ->get();
    }

    public static function getJoueursParServeur($id_serv)
    {
        return self::select(
            'username'
        )
            ->where('id_serv', $id_serv)
            ->groupBy('username')
            ->orderBy('username')
            ->get();
    }
}
?>
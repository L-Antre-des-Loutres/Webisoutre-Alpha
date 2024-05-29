<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stats;
use App\Models\InfosServ;
use Illuminate\Support\Facades\Auth;

class ClassementController extends Controller
{
    public function classement()
    {
        // Récupération des stats total trié par joueur
        $statsParJoueur = Stats::getTotalHoursAndDeathsPerPlayer();

        // Récupération des serveurs actifs
        $serveurs = InfosServ::getAllInfosServ();

        // Vérification de la présence du paramètre 'serveurChoix' dans la requête GET
        if (request()->has('serveurChoix')) {
            // Si le paramètre est présent, récupérez sa valeur
            $serveurChoix = request()->serveurChoix;

            // Récupération des stats total trié par serveur
            $statsParJoueurParServeur = Stats::getStatsParJoueurParServeur($serveurChoix);
        } else {
            // Si le paramètre 'serveurChoix' n'est pas présent dans la requête GET,
            $statsParJoueurParServeur = [];
        }

        // Passer les informations du serveur et les statistiques à la vue
        return view('minecraft.classement', [
            'statsParJoueur' => $statsParJoueur,
            'serveurs' => $serveurs,
            'statsParJoueurParServeur' => $statsParJoueurParServeur
        ]);
    }

    public function profilStats()
    {
        // Logique pour afficher le classement général

        if (Auth::check()) {
            $admin = Auth::user()->admin;
        } else {
            $admin = 0;
        }

        // Vérification de la présence du paramètre 'username' dans la requête GET
        if (request()->has('username')) {
            // Si le paramètre est présent, récupérez sa valeur
            $username = request()->username;

            // Récupération des stats du joueur
            $joueurStats = Stats::getAllStatsParUsername($username);
        } else {
            // Si le paramètre 'username' n'est pas présent dans la requête GET,
            $joueurStats = collect(); // empty collection
            $username = null;
        }
        return view('minecraft.stats', [
            'joueurStats' => $joueurStats,
            'username' => $username,
            'admin' => $admin
        ]);
    }

    public function deleteStats($id_stats, $username)
    {
        try {
            $stats = Stats::findOrFail($id_stats);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case when the server is not found
            return redirect()->route('statsJoueur', ['username' => $username])->with('error', 'Serveur non trouvé.');
        }
        // Suppression du serveur dans la base de données
        $stats->delete();

        return redirect()->route('statsJoueur', ['username' => $username]);
    }
}

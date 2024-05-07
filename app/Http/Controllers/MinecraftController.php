<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Models
use App\Models\InfosServ;
use App\Models\Stats;

class MinecraftController extends Controller
{

    ///////////////////////////////////////////////////////////////////////////////////// Partie utilisateur /////////////////////////////////////////////////////////////////////////////////

    public function index()
    {
        // Votre logique pour la page d'accueil du dossier "genshin"
        return view('minecraft.accueil-minecraft');
    }

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
            // vous pouvez effectuer une action en conséquence.
            // Par exemple, vous pouvez définir $statsParJoueurParServeur comme vide ou rediriger l'utilisateur.
            $statsParJoueurParServeur = [];
        }

        // Passer les informations du serveur et les statistiques à la vue
        return view('minecraft.classement', [
            'statsParJoueur' => $statsParJoueur,
            'serveurs' => $serveurs,
            'statsParJoueurParServeur' => $statsParJoueurParServeur
        ]);
    }


    public function detail(Request $request)
    {
        // Récupérer l'ID du serveur à partir des paramètres de la requête
        $id_serv = $request->input('id_serv');

        // Utiliser la fonction getInfosWithID pour obtenir les informations du serveur
        $serveur = InfosServ::getInfosWithID($id_serv);

        // Utiliser la fonction getNbJoueursParIdServ pour obtenir le nombre de joueurs sur le serveur
        $nb_joueurs = Stats::getNbJoueursParIdServ($serveur->id_serv)->first();

        // Utiliser la fonction getJoueurParIdServ pour obtenir les joueurs sur le serveur
        $joueurs = Stats::getJoueursParServeur($serveur->id_serv);

        // Passer les informations du serveur à la vue
        return view('minecraft.detail', ['serveur' => $serveur, 'nb_joueurs' => $nb_joueurs, 'joueurs' => $joueurs]);
    }

    public function liste()
    {
        // Logique pour afficher le classement général

        if (Auth::check()) {
            $admin = Auth::user()->admin;
            $serveurs = InfosServ::getAllInfosServ();
        } else {
            $admin = 0;
            $serveurs = InfosServ::getInfosServActif();
        }

        // Tableau pour stocker le nombre de joueurs pour chaque serveur
        $nb_joueurs_par_serveur = [];

        // Boucle pour obtenir le nombre de joueurs pour chaque serveur
        foreach ($serveurs as $serveur) {
            $nb_joueurs = Stats::getNbJoueursParIdServ($serveur->id_serv)->first();
            $nb_joueurs_par_serveur[$serveur->id_serv] = $nb_joueurs ? $nb_joueurs->nb_joueurs : 0;
        }

        return view('minecraft.liste', ['serveurs' => $serveurs, 'admin' => $admin, 'nb_joueurs_par_serveur' => $nb_joueurs_par_serveur]);
    }

    ////////////////////////////////////////////////////////////////////////////////////// Partie Admin ////////////////////////////////////////////////////////////////////////////////////

    public function panel()
    {
        // Logique pour afficher le classement général
        return view('minecraft.admin.panelAdmin');
    }
    public function addServ()
    {
        // Logique pour afficher le classement général
        return view('minecraft.admin.creerServeur');
    }
    public function editServ(Request $request)
    {
        // Récupérer l'ID du serveur à partir des paramètres de la requête
        $serveurID = $request->input('serveurID');
    
        // Utilisez correctement l'ID du serveur pour récupérer les informations
        $serveur = InfosServ::getInfosWithID($serveurID);
    
        // Passer l'ID du serveur à la vue du formulaire de modification
        return view('minecraft.admin.editServeur', ['serveur' => $serveur, 'serveurID' => $serveurID]);
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom_serv' => 'required|max:100',
            'modpack' => 'required|max:100',
            'modpack_url' => 'required|max:100',
            'embedColor' => 'required|max:100',
            'embedImage' => 'required|max:100',
            'caption' => 'required|max:100',
            'nom_monde' => 'required|max:100',
            'version_serv' => 'required|max:100',
            'path_serv' => 'required|max:100',
            'actif' => 'boolean',
        ]);

        // Création d'une nouvelle instance de Serveur
        $serveur = new InfosServ;

        // Attribution des valeurs du formulaire aux propriétés du modèle
        $serveur->nom_serv = $request->nom_serv;
        $serveur->modpack = $request->modpack;
        $serveur->modpack_url = $request->modpack_url;
        $serveur->embedColor = $request->embedColor;
        $serveur->embedImage = $request->embedImage;
        $serveur->caption = $request->caption;
        $serveur->nom_monde = $request->nom_monde;
        $serveur->version_serv = $request->version_serv;
        $serveur->path_serv = $request->path_serv;
        $serveur->actif = $request->has('actif');

        // Sauvegarde du serveur dans la base de données
        $serveur->save();

        return redirect()->route('admin.creerServeur');
    }

    public function update(Request $request, $id_serv)
    {
        try {
            $serveur = InfosServ::findOrFail($id_serv);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case when the server is not found
            return redirect()->route('admin.edit', ['id_serv' => $id_serv])->with('error', 'Serveur non trouvé.');
        }
        // Validation des données du formulaire
        $request->validate([
            'nom_serv' => 'required|max:100',
            'modpack' => 'required|max:100',
            'modpack_url' => 'required|max:100',
            'embedColor' => 'required|max:100',
            'embedImage' => 'required|max:100',
            'caption' => 'required|max:100',
            'nom_monde' => 'required|max:100',
            'version_serv' => 'required|max:100',
            'path_serv' => 'required|max:100',
            'actif' => 'boolean',
        ]);

        // Récupération du serveur à modifier
        $serveur = InfosServ::findOrFail($id_serv);

        // Attribution des nouvelles valeurs du formulaire aux propriétés du modèle
        $serveur->nom_serv = $request->nom_serv;
        $serveur->modpack = $request->modpack;
        $serveur->modpack_url = $request->modpack_url;
        $serveur->embedColor = $request->embedColor;
        $serveur->embedImage = $request->embedImage;
        $serveur->caption = $request->caption;
        $serveur->nom_monde = $request->nom_monde;
        $serveur->version_serv = $request->version_serv;
        $serveur->path_serv = $request->path_serv;
        $serveur->actif = $request->has('actif');

        // Sauvegarde des modifications dans la base de données
        $serveur->save();

        return redirect()->route('liste-serveurs', ['id_serv' => $id_serv]);
    }

    public function delete($id_serv)
    {
        try {
            $serveur = InfosServ::findOrFail($id_serv);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case when the server is not found
            return redirect()->route('liste-serveurs')->with('error', 'Serveur non trouvé.');
        }
        // Suppression du serveur dans la base de données
        $serveur->delete();

        return redirect()->route('liste-serveurs');
    }
}
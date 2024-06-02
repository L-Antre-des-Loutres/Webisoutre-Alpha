<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Badges;
use App\Models\BadgesDetails;
use App\Models\Stats;

class ProfilController extends Controller
{
    public function profil()
    {
        // Récupérer les informations de l'utilisateur connecté
        $user = auth()->user();

        // Si l'utilisateur n'est pas connecté, redirigez vers la page d'accueil
        if (!$user) {
            return redirect()->route('accueil');
        }

        // Récupérer les badges de l'utilisateur
        $badges = Badges::getUserBadges($user->id);


        // Vérifiez si l'utilisateur a lié son compte Minecraft
        if ($user->uuid_minecraft) {

            try {
                // Récupérer le pseudo de l'utilisateur via l'uuid minecraft
                $response = file_get_contents("https://sessionserver.mojang.com/session/minecraft/profile/" . $user->uuid_minecraft);

                // Analyser & enregistrer la réponse
                $data = json_decode($response, true);
                $pseudonyme = $data['name'];

                // Récupération des stats du joueur
                $joueurStats = Stats::getAllStatsParUsername($pseudonyme);
                $username = $pseudonyme;
            } catch (\Exception $e) {
                $joueurStats = collect(); // empty collection
                $username = null;
            }
        }
        // Récupérer chaque image pour chaque badge et les stocker dans le tableau $badges
        foreach ($badges as $badge) {
            // Récupérer les détails de l'image pour chaque badge
            $badgeImage = BadgesDetails::getBadgeImage($badge->badge_id);
            // Assurez-vous que $badgeImage contient des données
            if (!empty($badgeImage)) {
                // Stockez le lien de l'image dans la propriété "image" de chaque badge
                $badge->image = $badgeImage->image_link;
            }
        }

        // Passer les informations de l'utilisateur et les badges à la vue
        return view('profil', compact('user', 'badges', 'joueurStats', 'username'));
    }

    public function profilParUsername($username)
    {
        // Récupérer les informations de l'utilisateur avec le nom d'utilisateur spécifié
        $user = User::where('name', $username)->first();

        // Si l'utilisateur n'existe pas, redirigez l'utilisateur vers la page d'accueil
        if (!$user) {
            return redirect()->route('accueil');
        }

        // Récupérer les badges de l'utilisateur
        $badges = Badges::getUserBadges($user->id);

        // Vérifiez si l'utilisateur a lié son compte Minecraft
        if ($user->uuid_minecraft) {

            try {
                // Récupérer le pseudo de l'utilisateur via l'uuid minecraft
                $response = file_get_contents("https://sessionserver.mojang.com/session/minecraft/profile/" . $user->uuid_minecraft);

                // Analyser & enregistrer la réponse
                $data = json_decode($response, true);
                $pseudonyme = $data['name'];

                // Récupération des stats du joueur
                $joueurStats = Stats::getAllStatsParUsername($pseudonyme);
                $username = $pseudonyme;
            } catch (\Exception $e) {
                $joueurStats = collect(); // empty collection
                $username = null;
            }
        }
        // Récupérer chaque image pour chaque badge et les stocker dans le tableau $badges
        foreach ($badges as $badge) {
            // Récupérer les détails de l'image pour chaque badge
            $badgeImage = BadgesDetails::getBadgeImage($badge->badge_id);
            // Assurez-vous que $badgeImage contient des données
            if (!empty($badgeImage)) {
                // Stockez le lien de l'image dans la propriété "image" de chaque badge
                $badge->image = $badgeImage->image_link;
            }
        }

        // Passer les informations de l'utilisateur et les badges à la vue
        return view('profil', compact('user', 'badges', 'joueurStats', 'username'));
    }

    public function badges()
    {
        // Récupérer les informations de l'utilisateur connecté
        $user = auth()->user();

        // Récupérer tous les badges
        $badges = BadgesDetails::all();

        // Passer les badges à la vue
        return view('badges', compact('badges', 'user'));
    }

    public function getBadge($badgeId)
    {
        // Récupérer l'utilisateur connecté
        $user = auth()->user();

        // Vérifier si l'utilisateur est connecté
        if (!$user) {
            return redirect()->route('accueil');
        }

        // Vérifier si l'utilisateur a déjà obtenu le badge
        $badge = Badges::where('user_id', $user->id)
            ->where('badge_id', $badgeId)
            ->first();

        // Si l'utilisateur n'a pas encore obtenu le badge, ajoutez-le
        if (!$badge) {
            Badges::insertBadge($user->id, $badgeId);
        }

        // Rediriger l'utilisateur vers la page des badges
        return redirect()->route('badges');
    }
}

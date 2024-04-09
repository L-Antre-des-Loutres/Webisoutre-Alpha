<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function connexionDiscord(Request $request)
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        // Vérifie si l'utilisateur à déjà enregistré son compte discord
        if (Auth::user()->id_discord) {
            return redirect(route('dashboard'));
        }

        if (!$request->has('code')) {
            return redirect('https://discord.com/api/oauth2/authorize?client_id=1183777618491879424&redirect_uri=https%3A%2F%2Fantredesloutres.online%2Flink-discord&response_type=code&scope=identify');
        }
        
        
        // Récupérez le code d'autorisation depuis la requête URL
        $code = $request->input('code');

        // Remplacez ces valeurs par celles de votre application Discord
        $clientId = '1183777618491879424';
        $clientSecret = 'xHTWhJjTBwpS5rze0pzFbbQpRaNZai0-';
        $redirectUri = 'https://antredesloutres.online/link-discord';

        // Étape 1: Obtenir le jeton d'accès en échangeant le code d'autorisation
        $tokenUrl = 'https://discord.com/api/oauth2/token';
        $data = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $redirectUri,
            'scope' => 'identify'
        ];

        $client = new Client();
        $response = $client->post($tokenUrl, ['form_params' => $data]);
        $accessToken = json_decode($response->getBody(), true)['access_token'];

        // Étape 2: Obtenir des informations sur l'utilisateur avec le jeton d'accès
        $userUrl = 'https://discord.com/api/users/@me';
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];

        $userResponse = $client->get($userUrl, ['headers' => $headers]);
        $userData = json_decode($userResponse->getBody(), true);

        // L'ID de connexion de l'utilisateur
        $userId = $userData['id'];

        // Récupérer le tag de l'utilisateur
        $userTag = $userData['username'];

        // Récupérer la pdp de l'utilisateur connecté
        $userPdp = $userData['avatar'];

        // Transforme l'avatar en lien
        $userPdp = "https://cdn.discordapp.com/avatars/".$userId."/".$userPdp.".png";

        // Récupérer l'email de l'utilisateur connecté
        $email = Auth::user()->email;

        // Instancier un objet User
        $user = new User();

        // Lier le compte Discord de l'utilisateur à son compte sur votre application
        $user->linkDiscord($userId, $userTag, $userPdp, $email);
        
        return redirect(route('dashboard'));
    }
}

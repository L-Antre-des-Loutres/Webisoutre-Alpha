<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profil()
    {
         // Vérification de la présence du paramètre 'username' dans la requête GET
         if (request()->has('username')) {
            // Si le paramètre est présent, récupérez sa valeur
            $username = request()->username;



        // Passer les informations de l'utilisateur à la vue
        return view('profil');
    }
}
}

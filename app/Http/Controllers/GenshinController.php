<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class GenshinController extends Controller
{
    public function index()
    {
        // Votre logique pour la page d'accueil du dossier "genshin"
        return view('genshin.accueil-genshin');
    }

    
}

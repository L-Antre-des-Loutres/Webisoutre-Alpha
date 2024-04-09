<?php

namespace App\Http\Controllers;

class DownloadController extends Controller
{
    public function downloadFiles($nom_fichier)
    {
        // Chemin complet du fichier
        $filePath = "/home/projet_slam/Webisoutre/storage/app/public/$nom_fichier";
    
        // Vérifiez si le fichier existe
        if (!file_exists($filePath)) {
            abort(404);
        }
    
        // Téléchargement du fichier avec un nom personnalisé
        return response()->download($filePath, $nom_fichier);
    }
    
}

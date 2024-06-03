<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BadgesDetails;

class BadgeController extends Controller
{
    public function listeBadges()
    {
        // Récupérer tous les badges
        $badges = BadgesDetails::all();

        // Afficher la liste des badges
        return view('badges.liste-badges', compact('badges'));
    }
    public function createBadgeForm()
    {
        return view('badges.create-badge');
    }

    public function createBadge(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'condition' => 'required|string|max:255',
            'image_link' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Récupérer les données du formulaire
        $data = $request->only(['title', 'description', 'condition']);

        // Vérifier si un fichier image a été téléchargé
        if ($request->hasFile('image_link')) {
            // Récupérer le fichier image
            $file = $request->file('image_link');
            // Générer un nom unique pour le fichier
            $fileName = time() . '_' . $file->getClientOriginalName();
            // Déplacer l'image dans le dossier 'public/images/badges'
            $file->move(public_path('images/badges'), $fileName);
            // Stocker uniquement le nom du fichier dans la base de données
            $data['image_link'] = $fileName;
        }

        // Créer un nouveau badge avec les données du formulaire
        BadgesDetails::create($data);

        // Rediriger l'utilisateur vers la page de la liste des badges
        return redirect()->route('badge.index')->with('success', 'Badge créé avec succès');
    }



    public function deleteBadge(Request $request)
    {
        // Récupérer l'ID du badge à supprimer
        $badgeId = $request->route('badge_id');

        // Supprimer le badge avec l'ID correspondant
        BadgesDetails::find($badgeId)->delete();

        // Rediriger l'utilisateur vers la page de profil
        return redirect()->route('badge.index');
    }

    public function updateBadge(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'condition' => 'required|string|max:255',
            'image_link' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Récupérer l'ID du badge à mettre à jour
        $badgeId = $request->route('badge_id');

        // Récupérer les données du formulaire
        $data = $request->only(['title', 'description', 'condition']);

         // Vérifier si un fichier image a été téléchargé
         if ($request->hasFile('image_link')) {
            // Récupérer le fichier image
            $file = $request->file('image_link');
            // Générer un nom unique pour le fichier
            $fileName = time() . '_' . $file->getClientOriginalName();
            // Déplacer l'image dans le dossier 'public/images/badges'
            $file->move(public_path('images/badges'), $fileName);
            // Stocker uniquement le nom du fichier dans la base de données
            $data['image_link'] = $fileName;
        }
        // Mettre à jour le badge avec les nouvelles données
        BadgesDetails::find($badgeId)->update($data);

        // Rediriger l'utilisateur vers la page de la liste des badges
        return redirect()->route('badge.index')->with('success', 'Badge mis à jour avec succès');
    }

    public function updateBadgeForm()
    {
        // Récupérer l'ID du badge à mettre à jour
        $badgeId = request()->route('badgeId');

        // Récupérer les détails du badge à mettre à jour
        $badge = BadgesDetails::find($badgeId);

        // Afficher le formulaire de mise à jour du badge avec les détails actuels
        return view('badges.update-badge', compact('badge'));
    }
}

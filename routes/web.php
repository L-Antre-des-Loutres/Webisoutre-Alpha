<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('accueil');

// Route Profil
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BadgeController;

// Route pour afficher le profil de l'utilisateur connecté
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');

// Route pour afficher le profil d'un utilisateur spécifique
Route::get('/profil/{username}', [ProfilController::class, 'profilParUsername'])->name('profil-username');

// Route pour les badges
Route::get('/badges', [ProfilController::class, 'badges'])->name('badges');

// Route pour obtenir un badge
Route::post('/badges/{badgeId}', [ProfilController::class, 'getBadge'])->name('getBadge');


// Route Genshin
use App\Http\Controllers\GenshinController;

Route::get('/genshin', [GenshinController::class, 'index'])->name('accueil-genshin');

// Route Minecraft
use App\Http\Controllers\MinecraftController;

Route::get('/minecraft', [MinecraftController::class, 'index'])->name('accueil-minecraft');
Route::get('/minecraft/classement', [MinecraftController::class, 'classement'])->name('classement-minecraft');
Route::get('/minecraft/liste', [MinecraftController::class, 'liste'])->name('liste-serveurs');
Route::get('/minecraft/serveur/detail', [MinecraftController::class, 'detail'])->name('detail-minecraft');

// Route Classement Minecraft
use App\Http\Controllers\ClassementController;

Route::get('/minecraft/classement', [ClassementController::class, 'classement'])->name('classement-minecraft');
Route::get('/minecraft/classement/?classement=joueur', [ClassementController::class, 'classement'])->name('classement-minecraft-joueur');
Route::get('/minecraft/classement/?classement=serveur', [ClassementController::class, 'classement'])->name('classement-minecraft-serveur');
Route::get('/minecraft/stats/joueur', [ClassementController::class, 'profilStats'])->name('statsJoueur');
Route::delete('/minecraft/admin/supprimerStats/{id_stats}/{username}', [ClassementController::class, 'deleteStats'])->name('admin-deleteStats');


// Les routes nécessitant une authentification admin
Route::group(['middleware' => AdminMiddleware::class], function () {

    Route::get('/minecraft/admin/panel', [MinecraftController::class, 'panel'])->name('admin-panel');
    Route::get('/minecraft/admin/ajouterServeur', [MinecraftController::class, 'addServ'])->name('admin.creerServeur');
    Route::post('/mincraft/admin/ajouterServeur', [MinecraftController::class, 'store'])->name('admin.creerServeur.store');
    Route::get('/minecraft/admin/modifierServeur', [MinecraftController::class, 'editServ'])->name('admin-modifierServeur');
    Route::put('minecraft/admin/modifierServeur/{id_serv}', [MinecraftController::class, 'update'])->name('admin-update');
    Route::delete('/minecraft/admin/supprimerServeur/{id_serv}', [MinecraftController::class, 'delete'])->name('admin-delete');

    // Route pour afficher le formulaire de création d'un badge
    Route::get('/badge/create', [BadgeController::class, 'createBadgeForm'])->name('createBadgeForm');

    // Route pour afficher la liste des badges
    Route::get('/badge/liste', [BadgeController::class, 'listeBadges'])->name('badge.index');

    // Route pour afficher le formulaire de mise à jour d'un badge
    Route::get('/badge/update/{badgeId}', [BadgeController::class, 'updateBadgeForm'])->name('badge.update.form');

    // Route pour créer un badge
    Route::post('/badge/create', [BadgeController::class, 'createBadge'])->name('badge.store');
    // Route pour supprimer un badge
    Route::delete('/badge/delete/{badge_id}', [BadgeController::class, 'deleteBadge'])->name('badge.delete');
    // Route pour mettre à jour un badge
    Route::put('/badge/update/{badge_id}', [BadgeController::class, 'updateBadge'])->name('badge.update');


});

// Route de téléchargement
use App\Http\Controllers\DownloadController;

Route::get('/download/{nom_fichier}', [DownloadController::class, 'downloadFiles'])->name('download.file');

// Route connexion Discord
use App\Http\Controllers\ConnexionController;

Route::get('/discord/link', [ConnexionController::class, 'linkDiscord'])->name('link.discord');
Route::get('/discord/connexion', [ConnexionController::class, 'connexionDiscord'])->name('connexion.discord');

// Route authentification
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route tickets
use App\Http\Controllers\TicketController;

Route::resource('tickets', TicketController::class);

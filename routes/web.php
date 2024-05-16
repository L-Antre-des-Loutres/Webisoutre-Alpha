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

// Route Genshin
use App\Http\Controllers\GenshinController;

Route::get('/genshin', [GenshinController::class, 'index'])->name('accueil-genshin');

// Route Minecraft
use App\Http\Controllers\MinecraftController;

Route::get('/minecraft', [MinecraftController::class, 'index'])->name('accueil-minecraft');
Route::get('/minecraft/classement', [MinecraftController::class, 'classement'])->name('classement-minecraft');
Route::get('/minecraft/classement/?classement=joueur', [MinecraftController::class, 'serveur'])->name('classement-minecraft-joueur');
Route::get('/minecraft/classement/?classement=serveur', [MinecraftController::class, 'serveur'])->name('classement-minecraft-serveur');
Route::get('/minecraft/liste', [MinecraftController::class, 'liste'])->name('liste-serveurs');
Route::get('/minecraft/serveur/detail', [MinecraftController::class, 'detail'])->name('detail-minecraft');

// Route Minecraft Admin
// Les routes nécessitant une authentification admin
Route::group(['middleware' => AdminMiddleware::class], function () {

    Route::get('/minecraft/admin/panel', [MinecraftController::class, 'panel'])->name('admin-panel');
    Route::get('/minecraft/admin/ajouterServeur', [MinecraftController::class, 'addServ'])->name('admin.creerServeur');
    Route::post('/mincraft/admin/ajouterServeur', [MinecraftController::class, 'store'])->name('admin.creerServeur.store');
    Route::get('/minecraft/admin/modifierServeur', [MinecraftController::class, 'editServ'])->name('admin-modifierServeur');
    Route::put('minecraft/admin/modifierServeur/{id_serv}', [MinecraftController::class, 'update'])->name('admin-update');
    Route::delete('/minecraft/admin/supprimerServeur/{id_serv}', [MinecraftController::class, 'delete'])->name('admin-delete');

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




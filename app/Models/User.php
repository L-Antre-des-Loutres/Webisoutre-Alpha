<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\LinkMcViaDiscord;
use InvalidArgumentException;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_discord',
        'tag_discord',
        'pdp_discord',
        'uuid_minecraft',
        'admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Link Discord account.
     *
     * @param string $discordId
     * @return void
     */

    public function linkDiscord($id_discord, $user_tag, $userPdp, $email)
    {
        // Recherche l'utilisateur par son adresse e-mail
        $user = User::where('email', $email)->first();

        // Récupére l'uuid minecraft par rapport à l'id discord si il est enregisté
        $uuid = LinkMcViaDiscord::where('id_discord', $id_discord)->value('uuid_minecraft');

        // Vérifie si l'utilisateur existe
        if ($user) {
            // Met à jour l'ID Discord de l'utilisateur trouvé
            $user->id_discord = $id_discord;
            $user->tag_discord = $user_tag;
            $user->pdp_discord = $userPdp;
            $user->uuid_minecraft = $uuid;
            $user->save();

        }
    }

    public function connexionDiscord($id_discord)
    {
        // Valider que l'id_discord est de type string ou int
        if (!is_string($id_discord) && !is_int($id_discord)) {
            throw new InvalidArgumentException('L\'ID Discord doit être une chaîne de caractères ou un entier.');
        }

        // Recherche l'utilisateur par son id_discord
        $user = User::where('id_discord', $id_discord)->first();

        // Si l'utilisateur est trouvé, le connecter
        if ($user) {
            Auth::login($user);
            return response()->json(['message' => 'Connexion réussie.'], 200);
        } else {
            // Gérer le cas où l'utilisateur n'est pas trouvé
            return response()->json(['error' => 'Utilisateur non trouvé.'], 404);
        }
    }

}

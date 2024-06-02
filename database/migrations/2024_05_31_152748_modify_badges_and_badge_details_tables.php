<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ModifyBadgesAndBadgeDetailsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('badges');
        Schema::dropIfExists('badge_details');

        // Recréer la table badge_details en premier car elle est référencée par badges
        Schema::create('badge_details', function (Blueprint $table) {
            $table->id();  // Clé primaire auto-incrémentée
            $table->string('title');
            $table->text('description');
            $table->string('condition');
            $table->string('image_link')->nullable(); // Lien de l'image pour le badge (optionnel)
            $table->timestamps();
        });

        // Remplir la table badge détails avec des données

        // Badge de liaison compte Discord
        DB::table('badge_details')->insert([
            'title' => 'Liaison compte Discord',
            'description' => 'Badge obtenu après avoir lié votre compte Discord',
            'condition' => 'discord_linked',
            'image_link' => '/public/images/badges/admin.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Badge de liaison compte Minecraft
        DB::table('badge_details')->insert([
            'title' => 'Liaison compte Minecraft',
            'description' => 'Badge obtenu après avoir lié votre compte Minecraft',
            'condition' => 'minecraft_linked',
            'image_link' => '/public/images/badges/champion_vanilla.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Recréer la table badges
        Schema::create('badges', function (Blueprint $table) {
            $table->id();  // Clé primaire auto-incrémentée
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('badge_id'); // Colonne pour la clé étrangère vers badge_details
            $table->foreign('badge_id')->references('id')->on('badge_details')->onDelete('cascade');
            // Ajoutez d'autres colonnes pour les données de votre badge
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Supprimer les tables dans l'ordre inverse de la création pour éviter les problèmes de clé étrangère
        Schema::dropIfExists('badges');
        Schema::dropIfExists('badge_details');
    }
}
?>

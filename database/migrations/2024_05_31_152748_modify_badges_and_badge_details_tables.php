<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyBadgesAndBadgeDetailsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Supprimer les tables si elles existent
        Schema::dropIfExists('badge_details');
        Schema::dropIfExists('badges');

        // Recréer la table badges
        Schema::create('badges', function (Blueprint $table) {
            $table->id();  // Clé primaire auto-incrémentée
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Ajoutez d'autres colonnes pour les données de votre badge
            $table->timestamps();
        });

        // Recréer la table badge_details
        Schema::create('badge_details', function (Blueprint $table) {
            $table->id('id_badge');  // Clé primaire auto-incrémentée
            $table->unsignedBigInteger('badge_id');  // Colonne pour la clé étrangère vers badges
            $table->foreign('badge_id')->references('id')->on('badges')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('condition');
            $table->string('image_link')->nullable(); // Lien de l'image pour l'avoir (optionnel)
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
        Schema::dropIfExists('badge_details');
        Schema::dropIfExists('badges');
    }
}


?>

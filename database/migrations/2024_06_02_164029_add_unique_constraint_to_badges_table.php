<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueConstraintToBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('badges', function (Blueprint $table) {
            // Ajouter une contrainte d'unicité composite sur user_id et badge_id
            $table->unique(['user_id', 'badge_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('badges', function (Blueprint $table) {
            // Supprimer la contrainte d'unicité composite
            $table->dropUnique(['user_id', 'badge_id']);
        });
    }
}

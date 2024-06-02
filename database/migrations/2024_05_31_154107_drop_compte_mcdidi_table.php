<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCompteMcdidiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Vérifie si la table existe avant de la supprimer
        if (Schema::hasTable('compte_mcdidi')) {
            Schema::dropIfExists('compte_mcdidi');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Cette migration ne peut pas être annulée car elle supprime une table
    }
}

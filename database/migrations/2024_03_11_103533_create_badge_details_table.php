<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadgeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badge_details', function (Blueprint $table) {
            $table->id('id_badge');
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
        Schema::dropIfExists('badge_details');
    }
}

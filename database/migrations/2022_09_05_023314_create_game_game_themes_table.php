<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_game_themes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("game_id")->nullable()->constrained()->onDelete("cascade");
            $table->foreignId("game_theme_id")->nullable()->constrained()->onDelete("cascade");
            $table->unique(['game_id', 'game_theme_id']);
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
        Schema::dropIfExists('game_game_themes');
    }
};

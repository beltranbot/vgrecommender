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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId("game_category_id")->nullable()->constrained()->onDelete("cascade");
            $table->foreignId("game_status_id")->nullable()->constrained()->onDelete("cascade");
            $table->string("name")->nullable();
            $table->timestamp("first_release_date")->nullable();
            $table->string("slug")->nullable();
            $precision = 16;
            $scale = 13;
            $table->decimal("aggregated_rating", $precision, $scale)->nullable()->default(0);
            $table->bigInteger("aggregated_rating_count")->nullable()->default(0);
            $table->decimal("total_rating", $precision, $scale)->nullable()->default(0);
            $table->bigInteger("total_rating_count")->nullable()->default(0);
            $table->text("summary")->nullable();
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
        Schema::dropIfExists('games');
    }
};

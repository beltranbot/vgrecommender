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
        Schema::create('platforms', function (Blueprint $table) {
            $table->id();
            $table->foreignId("platform_category_id")->nullable()->constrained()->onDelete("cascade");
            $table->string("abbreviation")->nullable();
            $table->string("alternative_name")->nullable();
            $table->string("name")->nullable();
            $table->string("slug");
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
        Schema::dropIfExists('platforms');
    }
};
/*
    {
        "id": 158,
        "alternative_name": "Commodore Dynamic Total Vision",
        "category": 6,
        "created_at": 1510012800,
        "name": "Commodore CDTV",
        "platform_logo": 292,
        "slug": "commodore-cdtv",
        "updated_at": 1522972800,
        "url": "https://www.igdb.com/platforms/commodore-cdtv",
        "versions": [
            223
        ],
        "websites": [
            26
        ],
        "checksum": "5d48648e-283c-e2df-df7d-6d3cbc7e0a58"
    },
*/
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
        Schema::create('update_backlog', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->unsignedInteger("skip");
            $table->unsignedInteger("take");
            $table->unsignedInteger("entries");
            $table->boolean("fetch_current_page");
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
        Schema::dropIfExists('update_backlog');
    }
};

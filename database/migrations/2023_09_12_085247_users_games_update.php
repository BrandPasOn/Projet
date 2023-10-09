<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users_games', function (Blueprint $table) {
            $table->string('note')->nullable()->after('game_id');
            $table->boolean('is_wished')->default(false)->after('is_favorite');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_games', function (Blueprint $table) {
            //
        });
    }
};

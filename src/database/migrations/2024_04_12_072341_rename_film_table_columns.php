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
        Schema::table('films', function (Blueprint $table) {
            $table->renameColumn('titolo', 'title');
            $table->renameColumn('trama', 'description');
            $table->renameColumn('anno', 'year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('films', function (Blueprint $table) {
            $table->renameColumn('title', 'titolo');
            $table->renameColumn('description', 'trama');
            $table->renameColumn('year', 'anno');
        });
    }
};

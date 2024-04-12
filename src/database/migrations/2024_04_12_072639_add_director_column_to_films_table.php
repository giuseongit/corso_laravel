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
            $table->unsignedBigInteger('director_id')->nullable()->after('year');

            $table->foreign('director_id')->references('id')->on('directors')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('films', function (Blueprint $table) {
            $table->dropColumn('director_id');
        });
    }
};

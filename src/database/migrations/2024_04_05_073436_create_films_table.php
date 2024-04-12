<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('films', function(Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('release_year', 4);

            $table->text('description')
                ->nullable();

            $table->foreignId('author_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // ------------------
            //  Timestamps
            // ------------------
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};

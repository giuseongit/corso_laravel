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

        Schema::create('registas', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 100);
            $table->timestamps();
        });

        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string("titolo", 150);
            $table->text("trama")->nullable();
            $table->year("anno");
            $table->foreignId('regista_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
        Schema::dropIfExists('registas');
    }
};

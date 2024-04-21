<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100);
            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('author_id')->nullable()->constrained();

            $table->dropColumn('autore');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function(Blueprint $table){
            $table->dropForeign(['author_id']);
            
            $table->text('autore')->nullable();
        });
        
        Schema::dropIfExists('authors');
    }
};

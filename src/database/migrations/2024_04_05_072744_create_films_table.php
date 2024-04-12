<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('titolo');
            $table->string('trama')->nullable();
            $table->string('anno')->nullable();
            $table->timestamps();
        });

        Schema::table('regista', function (Blueprint $table) {
            $table->foreignId('regista_id')->nullable()->constrained();

            $table->dropColumn('regista');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {

        Schema::table('registas', function (Blueprint $table) {
            $table->dropForeign(['regista_id']);

            $table->text("regista")->nullable();
        });


        Schema::dropIfExists('films');
    }
};

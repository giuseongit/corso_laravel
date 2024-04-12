<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up()
        {
            Schema::create('registas', function (Blueprint $table) {
                $table->id()->unique();
                $table->string("titolo", 100);
                $table->timestamps();
            });

            Schema::table('films', function (Blueprint $table) {
                $table->foreignId('film_id')->nullable()->constrained();

                $table->dropColumn('film');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down()
        {
            Schema::table('films', function (Blueprint $table) {
                $table->dropForeign(['film_id']);

                $table->text("film")->nullable();
            });


            Schema::dropIfExists('registas');
        }
    };

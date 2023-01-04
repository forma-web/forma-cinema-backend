<?php

use App\Enums\RussianAgesEnum;
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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedSmallInteger('year')->nullable();
            $table->string('country')->nullable();
            $table->enum('age_restrictions', RussianAgesEnum::values())->nullable();
            $table->unsignedBigInteger('duration');
            $table->text('longline')->nullable();
            $table->text('description')->nullable();
            $table->string('poster')->nullable();
            $table->string('trailer')->nullable();
            $table->string('kinopoisk_id')->nullable();
            $table->string('kinopoisk_rating')->nullable();
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
        Schema::dropIfExists('movies');
    }
};

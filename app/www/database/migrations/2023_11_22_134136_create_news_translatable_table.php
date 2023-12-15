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
        if(!Schema::hasTable('news_translatable')) {
            Schema::create('news_translatable', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('news_id');
                $table->string('locale')->index();
                $table->string('title');
                $table->text('content')->nullable()->default(null);
                // Setting two columns as unique
                $table->unique(['news_id', 'locale'], 'news_locale');
                // Setting foreign key
                $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_translatable');
        Schema::table('news', function (Blueprint $table) {
            $table->string('title');
            $table->text('content')->nullable()->default(null);
            $table->string('thumbnail')->nullable();

        });
    }
};

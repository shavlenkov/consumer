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
        if(!Schema::hasTable('announcement_translatable')) {
            Schema::create('announcement_translatable', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('announcement_id');
                $table->string('locale')->index();
                $table->string('title');
                $table->text('content')->nullable()->default(null);
                // Setting two columns as unique
                $table->unique(['announcement_id', 'locale'], 'announcement_locale');
                // Setting foreign key
                $table->foreign('announcement_id')->references('id')->on('announcement')->onDelete('cascade');
            });
        }
        Schema::table('announcement', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('content');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcement_translatable');
        Schema::table('announcement', function (Blueprint $table) {
            $table->string('title');
            $table->text('content')->nullable()->default(null);
        });
    }
};

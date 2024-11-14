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
        Schema::create('wanted_felony', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wanted_id')->constrained('wanted')->cascadeOnDelete();
            $table->foreignId('felony_id')->constrained('felonies')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wanted_felony', function (Blueprint $table) {
            $table->dropForeign(['wanted_id']);
            $table->dropForeign(['felony_id']);
        });


        Schema::dropIfExists('wanted_felony');
    }
};

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
        Schema::table('wanted', function (Blueprint $table) {

            Schema::table('wanted', function (Blueprint $table) {
                $table->dropColumn('felony');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wanted', function (Blueprint $table) {
            Schema::table('wanted', function (Blueprint $table) {
                $table->string('felony')->nullable();
            });
        });
    }
};

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
            $table->unsignedBigInteger('device_id')->after('id');
            $table->foreign('device_id')->references('id')->on('devices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wanted', function (Blueprint $table) {

            $table->dropForeign("wanted_device_id_foreign");

            $table->dropColumn("device_id");
        });
    }
};

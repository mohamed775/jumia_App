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
        Schema::create('weekly_report_channels', function (Blueprint $table) {
            $table->id();
            $table->integer('inbound');
            $table->integer('liveChat');
            $table->integer('socialMedia');
            $table->integer('IR');
            $table->integer('Sales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_report_channels');
    }
};

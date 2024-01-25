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
        Schema::create('apologies', function (Blueprint $table) {
            $table->id();
            $table->string('WeekIssued');
            $table->string('Code');
            $table->string('Amount');
            $table->string('ExpaireDate');
            $table->string('ContactReason')->nullable();
            $table->string('OrderNumber')->nullable();
            $table->string('CaseNumber')->nullable();
            $table->string('CustomerEmail')->nullable();
            $table->string('CustomerID')->nullable();
            $table->dateTime('DateGiven')->nullable();
            $table->string('Channel')->nullable();
            $table->boolean('status')->default(true);
            $table->string('AgentName')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apologies');
    }
};

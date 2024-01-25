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
        Schema::create('agent_requests', function (Blueprint $table) {
            $table->id();
            $table->string('AgentName');
            $table->dateTime('DateGiven');
            $table->string('Amount');
            $table->string('ContactReason');
            $table->string('OrderNumber');
            $table->string('CaseNumber');
            $table->string('CustomerEmail');
            $table->string('CustomerID');
            $table->string('status');
            $table->string('Channel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_requests');
    }
};

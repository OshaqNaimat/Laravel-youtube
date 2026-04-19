<?php

// database/migrations/2026_04_19_000000_create_subscriptions_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscriber_id')->constrained('users')->onDelete('cascade'); // who subscribes
            $table->foreignId('channel_id')->constrained('users')->onDelete('cascade'); // who is subscribed to
            $table->timestamps();

            $table->unique(['subscriber_id', 'channel_id']); // avoid duplicate subscriptions
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};

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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->date('date');
            $table->string('seat');
            $table->string('pax');
            $table->string('amount');
            $table->string('paiement_mode');
            $table->text('comment');
            $table->foreignId('service_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('agency_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('client_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('course_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

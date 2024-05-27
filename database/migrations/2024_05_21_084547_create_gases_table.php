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
        Schema::create('gases', function (Blueprint $table) {
            $table->id();
            $table->string('km_depart');
            $table->string('km_arrival');
            $table->string('km_total');
            $table->string('amount');
            $table->time('time');
            $table->string('paiement_mode');
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gases');
    }
};

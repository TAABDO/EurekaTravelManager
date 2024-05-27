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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('depart_point');
            $table->string('arrival_point');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('car_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('expense_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('gas_id')->nullable()->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

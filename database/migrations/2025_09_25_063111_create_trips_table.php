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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('duration');
            $table->float('price', 10, 2)->nullable();
            $table->integer('capacity');
            $table->text('includes')->nullable();
            $table->text('excludes')->nullable();
            $table->string('status');
            $table->string('featured_image')->nullable();
            $table->date('departure_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
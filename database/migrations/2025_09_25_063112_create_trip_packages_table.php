<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('trip_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->constrained('trips')->onDelete('cascade');
            $table->string('name');
            $table->float('price', 10, 2);
            $table->text('includes');
            $table->text('excludes');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trip_packages');
    }
};

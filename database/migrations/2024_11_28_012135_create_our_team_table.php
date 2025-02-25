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
        Schema::create('our_team', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('name');
            $table->string('position');
            $table->text('description');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('dribbble')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_team');
    }
};

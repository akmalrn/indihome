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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('title');
            $table->string('overview');
            $table->text('description');
            $table->text('keywords');
            $table->text('descriptions');
            $table->foreignId('category_id')->constrained('category_blogs')->onDelete('cascade'); // Menyimpan relasi dengan category_services
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.tab
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

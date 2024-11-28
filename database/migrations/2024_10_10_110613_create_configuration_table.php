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
        Schema::create('configuration', function (Blueprint $table) {
            $table->id();
            $table->string('path')->nullable();
            $table->string('path_logo')->nullable();
            $table->string('website_name')->nullable();
            $table->string('title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_descriptions')->nullable();
            $table->string('footer')->nullable();
            $table->string('path_services')->nullable();
            $table->string('overview_1')->nullable();
            $table->string('description_1')->nullable();
            $table->string('price_1')->nullable();
            $table->string('path_1')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuration');
    }
};

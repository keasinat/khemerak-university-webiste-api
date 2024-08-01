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
        Schema::create('slideshows', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail');
            $table->string('link')->nullable();
            $table->string('headline_km')->nullable();
            $table->string('headline_en')->nullable();
            $table->string('content_km')->nullable();
            $table->string('content_en')->nullable();
            $table->string('btn_label_km')->nullable();
            $table->string('btn_label_en')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slideshows');
    }
};

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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_km');
            $table->string('position_en');
            $table->string('position_km');
            $table->text('short_desc_en');
            $table->text('short_desc_km');
            $table->longText('bio_en');
            $table->longText('bio_km');
            $table->string('thumbnail');
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};

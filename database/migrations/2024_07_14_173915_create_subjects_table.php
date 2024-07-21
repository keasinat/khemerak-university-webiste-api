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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_id')->constrained();
            $table->string('slug');
            $table->string('thumbnail')->nullable();
            $table->string('title_km');
            $table->string('title_en')->nullable();
            $table->string('highlight_km')->nullable();
            $table->string('highlight_en')->nullable();
            $table->longText('description_km')->nullable();
            $table->longText('description_en')->nullable();
            $table->boolean('is_published')->default(TRUE);
            $table->boolean('is_top')->default(FALSE);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};

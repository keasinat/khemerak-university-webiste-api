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
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->string('slug');
            $table->string('thumbnail')->nullable();
            $table->string('title_km');
            $table->string('title_en')->nullable();
            $table->text('description_km')->nullable();
            $table->text('description_en')->nullable();
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
        Schema::dropIfExists('academics');
    }
};

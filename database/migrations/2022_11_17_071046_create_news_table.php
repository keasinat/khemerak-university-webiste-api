<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ncategory_id')->constrained();
            $table->string('thumbnail')->nullable();
            $table->string('title_km');
            $table->string('title_en')->nullable();
            $table->text('description_km');
            $table->text('description_en')->nullable();
            $table->longText('content_km');
            $table->longText('content_en')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('is_published');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};

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

        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('logo', 255);
            $table->string('title_km', 255)->nullable();
            $table->string('title_en', 255)->nullable();
            $table->string('link', 255)->nullable();
            $table->boolean('is_published')->default(true);
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

        Schema::dropIfExists('partners');
    }
};

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
        Schema::create('business_activities', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->string('name_km');
            $table->longText('overview_km');
            $table->longText('fees_km');
            $table->longText('docs_km');
            $table->longText('camdigit_km');
            $table->longText('request_km');
            
            $table->timestamps();

            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_activities');
        // Schema::table('business_activities', function (Blueprint $table) {
        //     $table->dropForeign('business_activities_category_id_foreign');
        //     $table->dropColumn('category_id');
        // });
    }
};

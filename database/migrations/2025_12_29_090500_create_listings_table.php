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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained('countries')->cascadeOnDelete();
            $table->foreignId('administrative_level_1_id')->nullable()->constrained('administrative_level1s');
            $table->foreignId('administrative_level_2_id')->nullable()->constrained('administrative_level2s');
            $table->foreignId('administrative_level_3_id')->nullable()->constrained('administrative_level3s');
            $table->foreignId('administrative_level_4_id')->nullable()->constrained('administrative_level4s');
            $table->foreignId('sub_category_type_id')->constrained('sub_category_types');
            $table->foreignId('sub_actor_type_id')->nullable()->constrained('sub_actor_types');
            $table->foreignId('target_type_id')->nullable()->constrained('target_types');
            $table->string('listing_name');
            $table->datetime('listing_date');
            $table->text('additional_info')->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->text('issue')->nullable();
            $table->integer('number_of_incident')->nullable();
            $table->integer('number_of_injuries')->nullable();
            $table->integer('number_of_fatalities')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};

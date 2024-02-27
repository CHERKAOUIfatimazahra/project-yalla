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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->title();
            $table->description();
            $table->location();
            $table->start_datetime();
            $table->end_datetime();
            $table->enum("type", ["Physical", "Online"])->default("Physical");
            $table->price();
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("category_id")->constrained("categories");
            $table->foreignId("subcategory_id")->constrained("subCategories");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

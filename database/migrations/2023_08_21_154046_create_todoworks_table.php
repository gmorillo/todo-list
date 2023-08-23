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
        Schema::create('todoworks', function (Blueprint $table) {
            $table->id();
            $table->json('category_id');
            $table->string('name');
            $table->boolean('completed')->default(false);
            $table->timestamp('completed_date')->nullable();
            $table->timestamps();
            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todoworks');
    }
};

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
        Schema::create('post_transations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('locale_id')->constrained('locates')->onDelete('cascade'); // Foreign key references locates.id
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade'); // Foreign key references posts.id
            $table->string('name', 100); // Title of the post translation
            $table->text('content'); // Content of the post translation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_transations');
    }
};

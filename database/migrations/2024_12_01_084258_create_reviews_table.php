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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('book_id'); // foreign key
            $table->text('review');
            $table->unsignedTinyInteger('rating');
            $table->timestamps();

            // $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade'); // we use on delete so that when a book is deleted, all related reviews for that book will be deleted

            // same thing as the above
            $table->foreignId('book_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('review_replies', function (Blueprint $table) {
            $table->id('reply_id');

            $table->unsignedBigInteger('review_id')->unique();

            $table->string('responder_name');
            $table->text('reply');

            $table->timestamps();

            $table->foreign('review_id')
                ->references('review_id')
                ->on('reviews')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('review_replies');
    }
};

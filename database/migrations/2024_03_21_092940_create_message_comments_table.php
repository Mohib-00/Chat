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
        Schema::create('message_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('message_id');
            $table->integer('user_id');
            $table->mediumText('message')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->integer('uniquetimestamp')->nullable();         
            $table->string('updatedtimestamp')->nullable();
            $table->enum('status', ['active', 'deleted'])->nullable();
            $table->boolean('seen_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_comments');
    }
};

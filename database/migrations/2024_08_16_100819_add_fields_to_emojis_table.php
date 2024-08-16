<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('emojis', function (Blueprint $table) {
            $table->string('smileys')->nullable();    
            $table->string('animals')->nullable();   
            $table->string('food')->nullable();      
            $table->string('activity')->nullable();   
            $table->string('travel')->nullable();     
            $table->string('objects')->nullable();    
            $table->string('flags')->nullable();      
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emojis', function (Blueprint $table) {
            //
        });
    }
};

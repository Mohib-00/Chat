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
        Schema::table('message_comments', function (Blueprint $table) {
            $table->string('option1')->nullable(); 
            $table->string('option2')->nullable();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('message_comments', function (Blueprint $table) {
            $table->dropColumn(['option1', 'option2']);
        });
    }
};

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
            $table->string('edit_status')->nullable();
        });
    }

    public function down()
    {
        Schema::table('message_comments', function (Blueprint $table) {
            $table->dropColumn('edit_status');
        });
    }
};

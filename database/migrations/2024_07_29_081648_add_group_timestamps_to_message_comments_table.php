<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGroupTimestampsToMessageCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('message_comments', function (Blueprint $table) {
            $table->integer('groupUnixTimestamp')->nullable();
            $table->string('groupUpdatedTimestamp')->nullable();
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
            $table->dropColumn(['groupUnixTimestamp', 'groupUpdatedTimestamp']);
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGuideIdToUserGuideWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_guide_widgets', function (Blueprint $table) {
            $table->unsignedInteger('user_guide_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_guide_widgets', function (Blueprint $table) {
            $table->dropColumn('user_guide_id');
        });
    }
}

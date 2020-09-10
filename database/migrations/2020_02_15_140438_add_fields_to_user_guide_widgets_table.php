<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUserGuideWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_guide_widgets', function (Blueprint $table) {
            $table->unsignedInteger('web_browser')->nullable();
            $table->unsignedInteger('show_toolbar')->nullable();
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
            $table->dropColumn('web_browser');
            $table->dropColumn('show_toolbar');
        });
    }
}

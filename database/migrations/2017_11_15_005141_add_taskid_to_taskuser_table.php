<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTaskidToTaskuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_user', function($table) {
            $table->integer("task_id")->unsigned()->nullable();
            $table->foreign("task_id")->references("id")->on("task_user");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_user', function($table) {
            $table->dropColumn('task_id');
        });
    }
}

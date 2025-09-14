<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExerciseTimeToWeightLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('weight_logs', function (Blueprint $table) {
        $table->time('exercise_time')->nullable();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('weight_logs', function (Blueprint $table) {
        $table->dropColumn('exercise_time');
    });
}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToWeightLogsTable extends Migration
{
    /**
     * 実行（カラム追加）
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weight_logs', function (Blueprint $table) {
            // すでに存在していない場合のみ追加
            if (!Schema::hasColumn('weight_logs', 'date')) {
                $table->date('date')->after('weight');
            }
        });
    }

    /**
     * ロールバック（カラム削除）
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weight_logs', function (Blueprint $table) {
            if (Schema::hasColumn('weight_logs', 'date')) {
                $table->dropColumn('date');
            }
        });
    }
}
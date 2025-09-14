<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightLogsTable extends Migration
{
    public function up()
    {
        Schema::create('weight_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // users.id 参照
            $table->decimal('weight', 4, 1);    // 例: 記録した体重
            $table->date('logged_on');          // 例: 記録日
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weight_logs');
    }
}

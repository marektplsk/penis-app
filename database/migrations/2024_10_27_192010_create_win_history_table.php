<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('win_history', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->boolean('is_win');
            $table->decimal('risk', 8, 2);
            $table->decimal('risk_reward_ratio', 8, 2);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('deleted_at')->nullable(); // For soft deletes
        });
    }

    public function down()
    {
        Schema::dropIfExists('win_history');
    }
}

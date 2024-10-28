<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRiskColumnsToWinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wins', function (Blueprint $table) {
            $table->decimal('risk', 10, 2)->after('is_win'); // Add risk column
            $table->decimal('risk_reward_ratio', 10, 2)->after('risk'); // Add risk_reward_ratio column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wins', function (Blueprint $table) {
            $table->dropColumn(['risk', 'risk_reward_ratio']); // Remove columns if rolling back
        });
    }
}

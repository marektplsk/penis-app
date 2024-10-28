<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRiskToWinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('wins', 'risk')) {
            Schema::table('wins', function (Blueprint $table) {
                $table->decimal('risk', 10, 2)->after('is_win'); // Add column after is_win for better structure
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('wins', 'risk')) {
            Schema::table('wins', function (Blueprint $table) {
                $table->dropColumn('risk');
            });
        }
    }
}

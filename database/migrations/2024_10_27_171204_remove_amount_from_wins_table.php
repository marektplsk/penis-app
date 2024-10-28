<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveAmountFromWinsTable extends Migration
{
    public function up()
    {
        Schema::table('wins', function (Blueprint $table) {
            $table->dropColumn('amount'); // Remove the amount column
        });
    }

    public function down()
    {
        Schema::table('wins', function (Blueprint $table) {
            $table->decimal('amount', 10, 2)->nullable(); // Add it back if needed (adjust precision as necessary)
        });
    }
}


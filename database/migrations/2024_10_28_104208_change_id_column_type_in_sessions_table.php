<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIdColumnTypeInSessionsTable extends Migration
{
    public function up()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->string('id')->change(); // Change id to string
        });
    }

    public function down()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->bigInteger('id')->change(); // Change back if needed
        });
    }
}

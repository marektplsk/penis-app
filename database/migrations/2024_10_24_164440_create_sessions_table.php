<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('payload'); // Serialized session data
            $table->integer('last_activity'); // Last activity timestamp
            $table->string('ip_address')->nullable(); // Add the ip_address column here
            $table->string('user_agent')->nullable(); // Add user agent if needed
            $table->string('user_id')->nullable(); // Add user ID if needed
            // Add any additional columns that you may need
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}

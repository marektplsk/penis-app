<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinsTable extends Migration
{
    public function up()
    {
        Schema::create('wins', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('description'); // Description of the win/loss
            $table->boolean('is_win'); // Boolean indicating if it's a win
            $table->decimal('risk', 10, 2); // Risk percentage or amount
            $table->decimal('risk_reward_ratio', 10, 2); // Risk reward ratio
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('wins');
    }
}

